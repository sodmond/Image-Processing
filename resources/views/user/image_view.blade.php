<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            @font-face {
                font-family: "Barabara";
                src: url("{{ asset('public/fonts/Barabara.otf') }}");
            }
            @font-face {
                font-family: "SensaBrush";
                src: url("{{ asset('public/fonts/SensaSans-RegularDemo.otf') }}");
            }
            @font-face {
                font-family: "OpenSans";
                src: url("{{ asset('public/fonts/OpenSans.ttf') }}");
            }
            @font-face {
                font-family: "PlayfairDisplay";
                src: url("{{ asset('public/fonts/PlayfairDisplay.ttf') }}");
            }
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
    </head>
    <body>
        <div style="width:700px; height:990px; background:url('{{ asset("public/work/resized/".$imageInfo['original_image'])}}'); background-repeat:no-repeat; background-size:cover; background-position: center;">
            <!--<div style="position:absolute; margin-left:305px; margin-top:10px;"><img src="{{ asset('public/img/logo.png') }}" width="75"></div>-->
            <div style="width:inherit; position:absolute; margin-top:20px; text-align:center;">
                <img src="{{ asset('public/img/originally-black0.png') }}" style="width:600px; height:auto;">
            </div>
    
            <!-- Nickname -->
            <div style="position:absolute; width:220px; margin-top:280px; margin-left:480px; text-align:center; font-size:100%;">
                <div style="color:#FFF; font-size:18px; font-family:PlayfairDisplay; font-weight:600; text-transform:uppercase;">Nickname</div>
                @php $nickname = explode(' ', $imageInfo['nickname']) @endphp
                <span style="color:#E1CF93; padding-right:10px; font-family:Barabara; text-transform:uppercase;">@foreach($nickname as $nick) {{ $nick }}<br> @endforeach</span>
            </div>
    
            <!-- Traits -->
            <div style="position:absolute; width:inherit; margin-top:370px; margin-left:10px;">
                <div style="color:#E1CF93; font-size:27px; padding-left:20px; font-family:Barabara; text-transform:uppercase;">Originality <br>Traits</div>
                <ul style="color:#FFF; margin-top:0; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:600;">
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
	    		<img src="{{ asset('public/img/barcode.png') }}" style="width:90px; margin-right:50px;">
		    </div>

            <!-- Powered By -->
		    <div style="position:absolute; width:inherit; margin-top:860px;">
                <p style="padding-left: 20px;"><span style="color:#FFF; font-size:14px;">Powered by</span><br>
                <img src="{{ asset('public/img/logo.png') }}" width="75"></p>
    		</div>

		    <!-- Drink Responsibly -->
    		<div style="position:absolute; width:300px; margin-top:950px; margin-left:200px; text-align:center; color:#FFF; font-size:14px; font-family: Arial;">
                <img src="{{ asset('public/img/drink-responsibly.png') }}" style="width:120px; margin-left:30px;">
	    	</div>
        </div>
    </body>
</html>