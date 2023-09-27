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
        <div style="width:600px; height:850px; background:url('{{ asset("work/resized/".$imageInfo['original_image'])}}'); background-repeat:no-repeat; background-size:cover;">
            <div style="position:absolute; margin-left:245px;"><img src="{{ asset('img/logo.png') }}" width="100"></div>
            <div style="width:inherit; position:absolute; margin-top:100px; text-align:center;">
                <img src="{{ asset('img/originally-black.png') }}" style="width:500px;">
            </div>
    
            <!-- Nickname -->
            <div style="position:absolute; width:150px; margin-top:300px; margin-left:450px; text-align:center;">
                @php $nickname = explode(' ', $imageInfo['nickname']) @endphp
                <span style="color:#E1CF93; font-size:100%; padding-right:10px; font-family:Barabara; text-transform:uppercase;">@foreach($nickname as $nick) {{ $nick }}<br> @endforeach</span>
            </div>
    
            <!-- Traits -->
            <div style="position:absolute; width:inherit; margin-top:320px;">
                <div style="color:#E1CF93; font-size:20px; padding-left:20px; font-family:Barabara; text-transform:uppercase;">Originality <br>Traits</div>
                <ul style="color:#FFF; margin-top:0; font-family:Arial, Helvetica, sans-serif; font-size:13px">
                    @foreach (explode(',', $imageInfo['traits']) as $trait)
                        <li>{{ ucwords($trait) }}</li>
                    @endforeach
                </ul>
            </div>
    
            <!-- Job & Name -->
            <div style="position:absolute; width:inherit; margin-top:620px; text-align:center; text-transform:uppercase; color:#FFF; font-family:PlayfairDisplay;">
                <div style="font-size:24px;"><span style="color:#E1CF93;">An</span> Original</div>
                <div style="font-size:40px; font-weight:100; color:#E1CF93;">{{ strtoupper($imageInfo['job']) }}</div>
                <div style="font-size:18px; font-weight:900; text-align:right; margin-right:40px;">
                    <span style="font-family:OpenSans;">{{ $imageInfo['name'] }}</span>
                </div>
            </div>

            <!-- Barcode -->
    		<div style="position:absolute; width:inherit; margin-top:780px; text-align:right;">
	    		<img src="{{ asset('img/barcode.png') }}" style="width:80px; margin-right:50px;">
		    </div>

            <!-- Drink Responsibly -->
		    <div style="position:absolute; width:inherit; margin-top:820px;">
	    		<img src="{{ asset('img/drink-responsibly.png') }}" style="width:90px; margin-left:30px;">
    		</div>

		    <!-- Website link -->
    		<div style="position:absolute; width:inherit; margin-top:800px; text-align:center; color:#FFF; font-size:14px; font-family: Arial;">
                www.originallyblack.com<br>{{ '@trophystout' }}
	    	</div>
        </div>
    </body>
</html>