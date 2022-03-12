@extends('layouts/header')
@section('content')
<body>
<h1>Chatting</h1>
<b>Chatting with </b><br>
<br>
<div class ="chatArea">
    <div class="receiverBackgroundColor">
        <div class="showChat-name">
        docddddddd :
        </div>

        <div class="showChat-msg">
        dor msgfgfd gfdhgf hg fhg fhgffgh fghf ghg fhg fh fghgfhg hhfdgfdgbfd gfdbghfdbgfd vfdnmgbfg fdgfhbgfh gfdbg vbgbvfd v bv erjh vb g erv  gfverb
        </div>
    </div>
    <div class="senderBackgroundColor">
        <div class="showChat-msg alignRight">
        my msg hfdshbfcds fjhfcgdsh fdbnfgds fdfbvcdshc as d sabxbs ds cbasf  dcbdshf dnscb sdhf  dsfjehf c ds cebfc nds ch cdsn cwehc ds nmc bwh cvds bncv hmbv s
        </div>

        <div class="showChat-name alignRight">
        : You
        </div>
    </div>
</div>

<form action="" method="post">
    {{csrf_field()}}

    <div>
    <textarea class="textareaSize" name="address"></textarea><br><br>
    </div>

    <div class ="chatArea alignRight"><button type="submit" vlaue="registration">Send</button></div><br>
</form>
</body>
@endsection
