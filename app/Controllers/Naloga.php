<?php
// Get the method name and arguments from command line arguments
$method = $argv[1];
$args = array_slice($argv, 2);

// Instantiate the class

// Check if the method exists
if (!method_exists(Bank::class, $method)) {
  echo "Method '$method' does not exist.\n";
  exit(1);
}

// Call the method with the provided arguments
call_user_func_array([Bank::class, $method], $args);

if (file_exists('users.txt')) {
  // Read the array data from the file
  $usersTxt = file_get_contents('users.txt');
  // Unserialize the data to restore the array
  Bank::$users = unserialize($usersTxt);
} else {
  // Set a default value for the array if the file doesn't exist
  $myArray = [];
}
if (file_exists('transactions.txt')) {
  // Read the array data from the file
  $usersTxt = file_get_contents('transactions.txt');
  // Unserialize the data to restore the array
  Bank::$users = unserialize($usersTxt);
} else {
  // Set a default value for the array if the file doesn't exist
  $myArray = [];
}

class Bank{
  static public $users;
  static public $transactions;

  protected static function randomUsers(){
    $usersArray = [];
    foreach (range(1,5) as $id){
      array_push($usersArray, new User($id,"uporabnik_".$id, mt_rand(950905909,1582057909)));
    }
    file_put_contents('users.txt', serialize($usersArray));

    echo "Random users created";
    var_dump(Bank::$users);
  }

  protected static function randomTransactions(){
    $transactionsArray = [];
    foreach (range(1,5) as $user_id){
      foreach (range(1,40) as $id){
        $deposit = 0;
        $withdraw = 0;
        $transactionType = mt_rand(1,2);
        if ($transactionType%2 == 0){
          $deposit = mt_rand(1,200);
        }
        else{
          $withdraw = mt_rand(1,200);
        }
        array_push($transactionsArray, new Transaction($id,$user_id, mt_rand(1514842992,1530391392),$deposit,$withdraw));
      }
    }
    file_put_contents('transactions.txt', serialize($transactionsArray));


    echo "Random users created";
    //var_dump($transactionsArray);
  }
  
  public static function randomize(){
    self::randomTransactions();
    self::randomUsers();
  }
  
  public static function balance(){
    $userbalances=[];
    $usersTxt = file_get_contents('users.txt');
    Bank::$users = unserialize($usersTxt);

    $transactionsTxt = file_get_contents('transactions.txt');
    Bank::$transactions = unserialize($transactionsTxt);
    
    foreach (Bank::$users as $user){
      $userbalances[$user->name] = 0;
      foreach (self::$transactions as $transaction){
        if ($transaction->user_id == $user->id){
          $userbalances[$user->name]=$userbalances[$user->name]+$transaction->deposit;
          $userbalances[$user->name]=$userbalances[$user->name]-$transaction->withdraw;
        }
      }
    }
    foreach ($userbalances as $key=>$userbalance){
      echo $key . " : " . $userbalance . "\r\n";
    }
  }
  
  public static function transactions(){
    $monthlyTransactions=[];
    $usersTxt = file_get_contents('users.txt');
    Bank::$users = unserialize($usersTxt);

    $transactionsTxt = file_get_contents('transactions.txt');
    Bank::$transactions = unserialize($transactionsTxt);

    foreach (Bank::$transactions as $transaction){
      for($iM =1;$iM<=12;$iM++){
        if (date("M", strtotime("$iM/1/18")) == date("M",$transaction->date)){
          if (empty($monthlyTransactions[date("M", strtotime("$iM/1/18"))])){
            $monthlyTransactions[date("M", strtotime("$iM/1/18"))]=array();
          }
            array_push($monthlyTransactions[date("M", strtotime("$iM/1/18"))], $transaction);
        }
      }
    }
    
    foreach ($monthlyTransactions as $key => $month){
      echo "Month: " .  $key . "\r\n";
      foreach ($month as $transaction){
        if ((int)$transaction->deposit != 0){
          echo "user id: " . $transaction->user_id . " priliv: " . $transaction->deposit . "\r\n";
        }else{
          echo "user id: " . $transaction->user_id . " odliv: " . $transaction->withdraw . "\r\n";
        }
      }
    }
  }

  public static function dailyTransactions($month){
    $monthlyTransactions=[];
    $usersTxt = file_get_contents('users.txt');
    Bank::$users = unserialize($usersTxt);

    $transactionsTxt = file_get_contents('transactions.txt');
    Bank::$transactions = unserialize($transactionsTxt);

    foreach (Bank::$transactions as $transaction){
        if (date("M", strtotime("$month/1/18")) == date("M",strtotime($transaction->date))){
          if (empty($monthlyTransactions[date("d",$transaction->date)])){
            $monthlyTransactions[date("d",$transaction->date)]=array();
          }
          array_push($monthlyTransactions[date("d",$transaction->date)], $transaction);
        }
    }

    foreach ($monthlyTransactions as $key => $month){
      echo "Day: " .  $key . "\r\n";
      foreach ($month as $transaction){
        if ((int)$transaction->deposit != 0){
          echo "datum: " . date("Y-M-d",(int)$transaction->date) . " uporabnik: ". $transaction->user_id . " priliv: " . $transaction->deposit . "\r\n";
        }else{
          echo "datum: " . date("Y-M-d",(int)$transaction->date) . " uporabnik: ". $transaction->user_id  . " odliv: " . $transaction->withdraw . "\r\n";
        }
      }
    }
  }

  public static function negativeBalance(){
    $daystates = [];
    $userbalances=[];
    $usersTxt = file_get_contents('users.txt');
    Bank::$users = unserialize($usersTxt);

    $transactionsTxt = file_get_contents('transactions.txt');
    Bank::$transactions = unserialize($transactionsTxt);

    foreach (Bank::$users as $user){
      $userbalances[$user->name] = 0;
      foreach (self::$transactions as $transaction){
        if ($transaction->user_id == $user->id){
          $userbalances[$user->name]=$userbalances[$user->name]+$transaction->deposit;
          $userbalances[$user->name]=$userbalances[$user->name]-$transaction->withdraw;
          if ($userbalances[$user->name]<0){
            echo $dateint;
            (int)$dateint = $transaction->date;
            $daystates[$dateint] = "User:" . $user->name . " Stanje:" . $userbalances[$user->name];
          }
        }
      }
    }
    var_dump($daystates);
    if (count($daystates)>1){
      ksort($daystates);
    }
    foreach ($daystates as $key=>$userbalance){
      echo date("Y-M-d",(int)$key) . " : " . $userbalance . "\r\n";
    }
  }
  
}

class User{
  public $id;
  public $name;
  protected $birth_date;

  public function __construct(int $id, string $name, int $birth_date)
  {
    $this->id = $id;
    $this->name = $name;
    $this->birth_date = $birth_date;
  }
}

class Transaction{
  public $id;
  public $user_id;
  public $date;
  public $deposit;
  public $withdraw;

  public function __construct(int $id, int $user_id, int $date, int $deposit, int $withdraw)
  {
    $this->id = $id;
    $this->user_id = $user_id;
    $this->date = $date;
    $this->deposit = $deposit;
    $this->withdraw = $withdraw;
  }
}



  