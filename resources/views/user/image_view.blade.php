<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            @font-face {
                font-family: "Barabara";
                src: url("{{ asset('fonts/Barabara.otf') }}");
            }
            @font-face {
                font-family: "SensaBrush";
                src: url("{{ asset('fonts/SensaSans-RegularDemo.otf') }}");
            }
            @font-face {
                font-family: "OpenSans";
                src: url("{{ asset('fonts/OpenSans.ttf') }}");
            }
            @font-face {
                font-family: "PlayfairDisplay";
                src: url("{{ asset('fonts/PlayfairDisplay.ttf') }}");
            }
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
    </head>
    <body>
        <div style="width:700px; height:990px; background:url('{{ asset("work/resized/".$imageInfo['original_image'])}}'); background-repeat:no-repeat; background-size:cover; background-position: center;">
            <div style="position:absolute; margin-left:305px; margin-top:10px;"><img src="{{ asset('img/logo.png') }}" width="75"></div>
            <div style="width:inherit; position:absolute; margin-top:80px; text-align:center;">
                <img src="{{ asset('img/originally-black0.png') }}" style="width:450px;">
            </div>
    
            <!-- Nickname -->
            <div style="position:absolute; width:160px; margin-top:370px; margin-left:530px; text-align:right; font-size:100%;">
                @php $nickname = explode(' ', $imageInfo['nickname']) @endphp
                <span style="color:#E1CF93; padding-right:10px; font-family:Barabara; text-transform:uppercase;">@foreach($nickname as $nick) {{ $nick }} @endforeach</span>
            </div>
    
            <!-- Traits -->
            <div style="position:absolute; width:inherit; margin-top:350px;">
                <div style="color:#E1CF93; font-size:23px; padding-left:20px; font-family:Barabara; text-transform:uppercase;">Originality <br>Traits</div>
                <ul style="color:#FFF; margin-top:0; font-family:Arial, Helvetica, sans-serif; font-size:13px">
                    @php 
                        $traits = explode(',', $imageInfo['traits']);
                        for ($i=0; $i < 3; $i++) {
                            echo '<li>'. ucwords($traits[$i]) .'</li>';
                        }
                    @endphp
                </ul>
            </div>
    
            <!-- Job & Name -->
            <div style="position:absolute; width:inherit; margin-top:680px; text-align:center; text-transform:uppercase; color:#FFF; font-family:Arial, Helvetica, sans-serif;">
                <div style="font-size:24px; font-family:PlayfairDisplay;"><span style="color:#E1CF93;">An</span> Original</div>
                <div style="font-size:40px; font-weight:100; color:#E1CF93; font-family:PlayfairDisplay;">{{ strtoupper($imageInfo['job']) }}</div>
                <div style="font-size:18px; font-weight:900; text-align:right; margin-right:40px; font-family:Barabara;">
                    <span style="font-family:Barabara;">{{ $imageInfo['name'] }}</span>
                </div>
            </div>

            <!-- Barcode -->
    		<div style="position:absolute; width:inherit; margin-top:920px; text-align:right;">
	    		<img src="{{ asset('img/barcode.png') }}" style="width:90px; margin-right:50px;">
		    </div>

            <!-- Drink Responsibly -->
		    <div style="position:absolute; width:inherit; margin-top:950px;">
	    		<img src="{{ asset('img/drink-responsibly.png') }}" style="width:90px; margin-left:30px;">
    		</div>

		    <!-- Website link -->
    		<div style="position:absolute; width:inherit; margin-top:940px; text-align:center; color:#FFF; font-size:14px; font-family: Arial;">
                www.originallyblack.com<br>{{ '@trophystout' }}
	    	</div>
        </div>
    </body>
</html>