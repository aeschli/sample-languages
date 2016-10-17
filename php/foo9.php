<?php

$content = file_get_contents('php://input');
$update = json_decode($content, true);

$text = trim($text);
$text = strtolower($text);

$filePath = 'jvm/jsm.json';

switch ($text) {
    case '/start':

    if (file_exists($filePath)) {
        // found
        $string = file_get_contents($filePath);
        $obj = json_decode($string, true);
        $ids = $obj['ids'];

    if (in_array($chatId, $ids)) {
            header('Content-Type: application/json');
            $parameters = array('chat_id' => $chatId, 'text' => 'running');
            $parameters['method'] = 'sendMessage';
            echo json_encode($parameters);
        }
        else {
            $ids[] = $chatId;
            $a = array('ids' => $ids);
            $fp = fopen($filePath, 'w');
            fwrite($fp, json_encode($a));
            fclose($fp);

            header('Content-Type: application/json');
            $parameters = array('chat_id' => $chatId, 'text' => 'Avviato');
            $parameters['method'] = 'sendMessage';
            echo json_encode($parameters);
        }
    }
    else {
        // not found
                   $a = array('ids' => array($chatId));
        $fp = fopen($filePath, 'w');
        fwrite($fp, json_encode($a));
        fclose($fp);

        header('Content-Type: application/json');
        $parameters = array('chat_id' => $chatId, 'text' => 'ok');
        $parameters['method'] = 'sendMessage';
        echo json_encode($parameters);
    }
    ;
    break;
    case '/stop':
           if (file_exists('jvm/jvm.json')) {

        $string = file_get_contents($filePath);
        $obj = json_decode($string, true);
        $ids = $obj['ids'];
        if (in_array($chatId, $ids)) {

            unset($ids[array_search($chatId, $ids)]);
            $a = array('ids' => $ids);
            $fp = fopen($filePath, 'w');
            fwrite($fp, json_encode($a));
            fclose($fp);

        }
        else{

            // cut...

        }

    }
    // cut...
}

?>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db
            <div class="row">
                <div class="col-md-6" style="padding-right: 5px">
                    <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
                </div>
                <div class="col-md-6" style="padding-left: 0px">
                    <select name="unit<?=($plan['col'])?>[]" class="form-control">
                        <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
                        <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
                        <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
                        <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
                        <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
                        <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
                        <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
                        <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db
                        <div class="row">
                            <div class="col-md-6" style="padding-right: 5px">
                                <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
                            </div>
                            <div class="col-md-6" style="padding-left: 0px">
                                <select name="unit<?=($plan['col'])?>[]" class="form-control">
                                    <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
                                    <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
                                    <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
                                    <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
                                    <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
                                    <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
                                    <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
                                    <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
                                </select>
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 5px">
                                            <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6" style="padding-left: 0px">
                                            <select name="unit<?=($plan['col'])?>[]" class="form-control">
                                                <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
                                                <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
                                                <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
                                                <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
                                                <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
                                                <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
                                                <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
                                                <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </option>
                    </select>
                </div>
            </div>
            
            
            </option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding-right: 5px">
        <input name="value<?=($plan['col'])?>[]" value="<?=$data[$plan['col']]['value']?>" type="text" class="form-control">
    </div>
    <div class="col-md-6" style="padding-left: 0px">
        <select name="unit<?=($plan['col'])?>[]" class="form-control">
            <option value="-1"<?=($data[$plan['col']]['unit'] == -1 ? ' selected' : '')?>>-</option>
            <option value="1"<?=($data[$plan['col']]['unit'] == 1 ? ' selected' : '')?>>Ft</option>
            <option value="2"<?=($data[$plan['col']]['unit'] == 2 ? ' selected' : '')?>>%</option>
            <option value="3"<?=($data[$plan['col']]['unit'] == 3 ? ' selected' : '')?>>kbit/s**</option>
            <option value="4"<?=($data[$plan['col']]['unit'] == 4 ? ' selected' : '')?>>perc</option>
            <option value="5"<?=($data[$plan['col']]['unit'] == 5 ? ' selected' : '')?>>MB</option>
            <option value="6"<?=($data[$plan['col']]['unit'] == 6 ? ' selected' : '')?>>GB</option>
            <option value="7"<?=($data[$plan['col']]['unit'] == 7 ? ' selected' : '')?>>db</option>
        </select>
    </div>
</div>