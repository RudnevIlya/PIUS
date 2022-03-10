<?php
include 'vendor/autoload.php';
include 'user.php';

echo "Ex2.2". '<br>';
class Comment {
    public string $message;
    public User $user;

    public function __construct(User $user, string $message)
    {
        $this->message = $message;
        $this->user = $user;
    }
}

$user1 = new User(1, 'Masha', 'example@mail.ru', 'password123');
$user2 = new User(2, 'Olya', 'gmail@yandex.ru', 'a11111');
$user3 = new User(3, 'Kirill', 'Kirill@gmail.com', '123456');
$user4 = new User(4, 'Student123', 'mail2@mail.ru', 'qwerty');
$user5 = new User(5, 'UserAdmin', 'qwerty@mail.ru', 'QG56l6Yhg');

$usersArray = [$user1, $user2, $user3, $user4, $user5];

$comment1 = new Comment($usersArray[0], "bug fix");
$comment2 = new Comment($usersArray[1], "hello");
$comment3 = new Comment($usersArray[2], "test msg");
$comment4 = new Comment($usersArray[3], "Anybody here?");
$comment5 = new Comment($usersArray[4], "zzzzzzz");
$comment6 = new Comment($usersArray[0], "read last msg");
$commentsArray = [$comment1, $comment2, $comment3,$comment4, $comment5, $comment6];
?>

<?php
if ($_POST) {
    $time = strtotime($_POST["YourDate"]);
    $time = date('d.m.Y H.i.s', $time);
    foreach ($commentsArray as $com) {
        if (date('d.m.Y H.i.s', $com->user->getTimeOfCreate()) > $time) {
            echo $com->message . '<br>';
        }
    }
}
?>
<form action="" method="post">
    Date:
    <input type="datetime-local" name="YourDate" /><br/>
    <input type="submit"/><br/>
</form>
