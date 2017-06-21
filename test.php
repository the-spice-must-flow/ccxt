<?php

include 'ccxt.php';

$markets = null;
$verbose = false;

try {

    include 'config.php';

} catch (Exception $e) {

    $markets = array ( // defaults

        '_1broker'    => array ('verbose' => $verbose, 'apiKey' => '', 'token' => '', ),
        '_1btcxe'     => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bit2c'       => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bitbay'      => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bitcoincoid' => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bitfinex'    => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bitlish'     => array ('verbose' => $verbose, 'apiKey' => '', 'login' => '', 'password' => '', ),
        'bitmarket'   => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bitmex'      => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bitso'       => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bittrex'     => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'btcx'        => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'bxinth'      => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'ccex'        => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'cex'         => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', 'uid' => '', ),
        'coincheck'   => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'coinsecure'  => array ('verbose' => $verbose, 'apiKey' => '', ),
        'exmo'        => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'fybse'       => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'fybsg'       => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'hitbtc'      => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'huobi'       => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'jubi'        => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'kraken'      => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'luno'        => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'okcoinusd'   => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'okcoincny'   => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'poloniex'    => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'quadrigacx'  => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', 'uid' => '', ),
        'quoine'      => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'therock'     => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'vaultoro'    => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'virwox'      => array ('verbose' => $verbose, 'apiKey' => '', 'login' => '', 'password' => '', ),
        'yobit'       => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
        'zaif'        => array ('verbose' => $verbose, 'apiKey' => '', 'secret' => '', ),
    );
}

//-----------------------------------------------------------------------------

foreach ($markets as $id => $params) {
    $market = '\\ccxt\\' . $id;
    $markets[$id] = new $market (array_merge (array (
        'id'      => $id,
        'verbose' => $verbose,
    ), $params));
}

function test_market ($market) {

    $delay = 3 * 1000000;

    echo "-----------------------------------------------------------------\n";
    // echo $market->id . "\n";
    $products = $market->load_products ();
    
    // echo $market->id . " products:\n";
    // var_dump ($products);
    
    echo $market->id . ' ' . count (array_keys ($products)) . " symbols: " . implode (", ", array_keys ($products)) . "\n";

    // usleep ($delay);

    // $orderbook = $market->fetch_order_book (array_keys ($products)[0]);
    // var_dump ($orderbook);

    // usleep ($delay);

    // $trades = $market->fetch_trades (array_keys ($products)[0]);
    // var_dump ($trades);

    // usleep ($delay);

    // $ticker = $market->fetch_ticker (array_keys ($products)[0]);
    // $ticker = $market->fetch_ticker ('BTC/USD');
    // var_dump ($ticker);

    // usleep ($delay);

    // $balance = $market->fetch_balance ();
    // var_dump ($balance);

    // usleep ($delay);
}

// foreach ($markets as $id => $market) {
//     try {
//         test_market ($market);  
//     } catch (Exception $e) {
//         var_dump ($e->getMessage ());
//         break;
//     }
// }

$market = $markets['zaif'];
test_market ($market);

?>