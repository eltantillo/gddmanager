<?php
require 'paypal/autoload.php';

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

class PayPal{
	public static function checkout($product, $price){
		$successUrl = URL . '/company/payment/?success=true';
		$failureUrl = URL . '/company/payment/?success=false';

		$paypal = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential(
			'Af42Rxbu9dUiCjLoMc9rNp3JODNNTpw8llq9hoa08ZvG_qcj1oExQkJnYSHM_Zfl4lwU0ksO1-RBgoME',
			'EG0jm0p_Fk5ol62uUu1gSeYiZ0hITwNkQNLcTRT-RBIC9vNOZBEEJqthFsehefgTy9821ccqd8_r6Q_-'
			)
		);

		$paypal->setConfig(
			array(
				'mode' => 'live',
				'log.LogEnabled' => false,
				'cache.enabled' => false,
			)
		);

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$item = new Item();
		$item->setName($product)
			 ->setCurrency('USD')
			 ->setQuantity(1)
			 ->setPrice($price);

		$itemList = new ItemList();
		$itemList->setItems([$item]);

		$details = new Details();
		$details->setSubtotal($price);

		$amount = new Amount();
		$amount->setCurrency('USD')
			   ->setTotal($price)
			   ->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
					->setItemList($itemList)
					->setDescription('GDDManager membership')
					->setInvoiceNumber(uniqid());

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($successUrl)
					 ->setCancelUrl($failureUrl);

		$payment = new Payment();
		$payment->setIntent('sale')
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions([$transaction]);

		try {
			$payment->create($paypal);
		} catch (Exception $e) {
			die($e);
		}

		$approvalUrl = $payment->getApprovalLink();

		header("Location: {$approvalUrl}");
	}

	public static function process($paymentID, $payerID){
		$paypal = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential(
			'Af42Rxbu9dUiCjLoMc9rNp3JODNNTpw8llq9hoa08ZvG_qcj1oExQkJnYSHM_Zfl4lwU0ksO1-RBgoME',
			'EG0jm0p_Fk5ol62uUu1gSeYiZ0hITwNkQNLcTRT-RBIC9vNOZBEEJqthFsehefgTy9821ccqd8_r6Q_-'
			)
		);

		$paypal->setConfig(
			array(
				'mode' => 'live',
				'log.LogEnabled' => false,
				'cache.enabled' => false,
			)
		);

		$payment = Payment::get($paymentID, $paypal);
		$execute = new PaymentExecution();
		$execute->setPayerId($payerID);

		try {
			$result = $payment->execute($execute, $paypal);
		} catch (Exception $e) {
			$data = json_decode($e->getData());
			//echo $data->message;
			return false;
		}

		return true;
	}
}
?>