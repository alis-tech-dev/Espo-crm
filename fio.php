<?php
include "bootstrap.php";
$app = new \Espo\Core\Application();

//var_dump($app->getContainer()->get('entityManager')->getEntity("Contact", "5f2da9af52fab3208"));
//
$app = new \Espo\Core\Application();
$entityManager = $app->getContainer()->get('entityManager');

$user = $entityManager->getRepository('User')->get('system');
if (!$user) {
    throw new Error("System user is not found");
}

$user->set('isAdmin', true);
$user->set('ipAddress', $_SERVER['REMOTE_ADDR']);

$entityManager->setUser($user);
$app->getContainer()->setUser($user);

foreach (glob("FioApi/*.php") as $filename)
{
    include $filename;
}


$downloader = new FioApi\Downloader('ezqsQ7iO7VWntpuh6pxLjdc6bwnBIUnpURIQCj1OZGfpzNevN1MCBxzK63OsKC2B');
$transactionList = $downloader->downloadSince(new \DateTimeImmutable('-1 week'));
//var_dump($transactionList);

foreach ($transactionList->getTransactions() as $transaction) {
	if($transaction->getSenderAccountNumber() != null){
	    if(strlen((string)(int)$transaction->getVariableSymbol()) < 5){
		$variable_symbol = str_repeat("0", 5 - strlen((string)(int)$transaction->getVariableSymbol())) . (int) $transaction->getVariableSymbol();
	    } else {
		$variable_symbol = $transaction->getVariableSymbol();
	    }
	    echo $variable_symbol . "\n";
	    $checkInvoice = $app->getContainer()->get('entityManager')->getRepository('Invoice')->where([
	        'number' => $variable_symbol,
	    ])->findOne();
	    if($checkInvoice != null){
		if($checkInvoice->get("grandTotalAmount") == strval($transaction->getAmount())){
	        $checkInvoice->set(array(
	            'payday' => $transaction->getDate()->format('Y-m-d'),
	            'status' => "Paid",
	        ));
	        $app->getContainer()->get('entityManager')->saveEntity($checkInvoice);
		}
	    }
	}
}
?>
