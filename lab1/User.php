<?php
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class User
{
    public int $id;
    public string $nickname;
    public string $email;
    public string $password;
    private $creationTime;

    public function getTimeOfCreate() {
        return $this->creationTime;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
        $metadata->addPropertyConstraint('nickname', new Assert\NotBlank());
        $metadata->addPropertyConstraint('nickname', new Assert\NotNull());
        $metadata->addPropertyConstraint('nickname', new Assert\Length(array(
            'min'=> 2,
            'max'=> 30,
        )));
        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'message' => 'Incorrect email.',
        )));
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
        $metadata->addPropertyConstraint('password', new Assert\Length(array(
            'min'=> 6,
            'max'=> 128,
        )));
    }

    public function __construct(int $id, string $nickname, string $email, string $password)
    {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->password = $password;
        $this->creationTime = strtotime(date('d.m.Y H.i.s'));
    }

    public function __toString()
    {
        return 'Id: ' . $this->id . " Nickname: " . 
        $this->nickname . " Email: " . $this->email . 
        " Password: " . $this->password;
    }
}

echo "Ex1.4". '<br>';
echo "Example(documentation)". '<br>';
echo "Bernhard". '<br>';
$validator = Validation::createValidator();
$violations = $validator->validate('Bernhard', [
    new Length(['min' => 10]),
    new NotBlank(),
]);

if (0 !== count($violations)) {
    // there are errors, now you can show them
    foreach ($violations as $violation) {
        echo $violation->getMessage().'<br>';
    }
}

echo "Ex2.1". '<br>';

$user = new User(1, 'Ilya', 'myemail@yandex.ru', '123456');

$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();
$violations = $validator->validate($user);

echo $user. '<br>';

if (count($violations) > 0) {
    echo "Incorrect user" . '<br>';
}
else {
    echo "User accept" . '<br>';
}

$user = new User(0, '.', 'my@email@yan@dex', 'qq');

echo $user. '<br>';

$violations = $validator->validate($user);

if (count($violations) < 0) {
    echo "User accept" . '<br>';
}
else {
    echo "Incorrect user" . '<br>';
}