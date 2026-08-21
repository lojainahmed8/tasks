<!-- ============ Account task============ -->

<?php

class Account {
    private string $id;
    private string $name;
    private int $balance;

    public function __construct(string $id, string $name, int $balance = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getBalance(): int {
        return $this->balance;
    }

    
    public function credit(int $amount): int {
        $this->balance += $amount;
        return $this->balance;
    }

    
    public function debit(int $amount): int {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Amount exceeded balance\n";
        }
        return $this->balance;
    }

   
    public function transferTo(Account $anotherAccount, int $amount): int {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $anotherAccount->credit($amount);
        } else {
            echo "Amount exceeded balance\n";
        }
        return $this->balance;
    }

  
    public function toString(): string {
        return "Account[id={$this->id},name={$this->name},balance={$this->balance}]";
    }
}


$acc1 = new Account("A101", "Lojain", 500);
$acc2 = new Account("A102", "Ahmed");

$acc1->credit(200); 
$acc1->debit(100); 

$acc1->transferTo($acc2, 300); 

echo $acc1->toString() . "\n";
echo $acc2->toString() . "\n";
?>