<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * メールアドレスが一意か判定後ユーザー登録処理を行ってユーザーIDを返却する
     *
     * @param string $name 氏名
     * @param string $kana ふりがな
     * @param string $tel 電話番号
     * @param string $email メールアドレス
     * @param string $body お問い合わせ内容
     */
    public function create_contact(string $name, string $kana, string $tel, string $email, string $body)
    {
        try{
            $this->dbh->beginTransaction();
            $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);//セキュリティ対策関数
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            $stmt->execute();

            $lastId = $this->dbh->lastInsertId();//最後に挿入された行のIDの取得と代入

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();

            return $lastId;//IDをかえす
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }

    }

    /**
    * お問合せ表示用のデータを取得して返却する
    * @return array データを返却する
    */
    public function getContacts(): array
    {
        try{
            $query = 'SELECT * FROM contacts';
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "認証エラー: ". $e->getMessage(). "\n";
            exit();
        }
    }

    /**
    * お問合せ表示用のデータを取得して返却する
    * @param string $id ユーザーID
    * @return stdClass ユーザーのデータを返却する
    */
    public function getEditPage(string $id): stdClass
    {
        try{
            $query = 'SELECT * FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "認証エラー: ". $e->getMessage(). "\n";
            exit();
        }
    }

    /**
    * ユーザーの情報を更新する
    * @param string $id 更新対象のID
    * @param string $name 氏名
    * @param string $kana ふりがな
    * @param string $tel  電話番号
    * @param string $email メールアドレス
    * @param string $body お問い合わせ内容
    * @return bool  
    */
    public function editUpdate(string $id, string $name, string $kana, string $tel, string $email, string $body): bool
    {
        try{
            $this->dbh->beginTransaction();
            $query =  'UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email,  body = :body WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);//セキュリティ対策関数
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            $stmt->execute();

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();
            return true;

        } catch (PDOException $e) {
        // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
        $this->dbh->rollBack();
        echo "登録失敗: " . $e->getMessage() . "\n";
        return false;
        exit();
        }

    }

    /**
    * IDに対応するお問合せのデータをテーブルから削除する
    * @param string $id お問合せID
    * @return void
    */
    public function contactDelete(string $id) {
        try{
            $this->dbh->beginTransaction();
            $query = 'DELETE FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();
            return;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "退会失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
}