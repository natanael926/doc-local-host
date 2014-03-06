<!DOCTYPE html>
<html>
<head>
    <title>Multi select</title>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.8.2/dijit/themes/claro/claro.css" />
    <script>dojoConfig = {parseOnLoad: true}</script>
    <script src="//ajax.googleapis.com/ajax/libs/dojo/1.8.2/dojo/dojo.js"></script>

    <style type="text/css">
        #select, #select2 {
            width:255px;
            height:300px;
            overflow:auto;
        }
        div#sel1, div#sel2 {
            float: left;
        }
        div#leftRightButtons {
            float: left;
            padding: 10em 0.5em 0 0.5em;
        }
    </style>

    <script type="text/javascript">

        require([
            "dojo/parser",
            "dojo/query",
            "dijit/registry",
            "dijit/form/MultiSelect",
            "dijit/dijit",
            "dojo/domReady!"
        ], function(parser, query, registry, MultiSelect, dijit) {

            parser.parse();


            query("select").forEach(function(n){

                if(!dijit.byNode(n)){
                    var foo = new dijit.form.MultiSelect({ name: n.name }, n).startup();
                }
            });


            query("button.switch").connect("onclick", function(e){

                console.log(registry.byId('select'));

                switch (e.target.id.toString()){
                    case 'left':
                        registry.byId('select').addSelected(registry.byId('select2'));
                        break;
                    case 'right':
                        registry.byId('select2').addSelected(registry.byId('select'));
                        break;
                }

            });

        })

    </script>


</head>
<body class="claro">

<div>
    <div id="sel1" role="presentation">
        <label for="select">First list:</label><br>
        <select id="select" multiple size="7" name="easing" tabindex="1">
            <option class="clone" value="a">a</option>
        </select>
    </div>
    <div id="leftRightButtons" role="presentation">
					<span>
						<button class="switch" id="left" title="Move Items to First list">&lt;</button>
						<button class="switch" id="right" title="Move Items to Second list">&gt;</button>
					</span>
    </div>
    <div id="sel2" role="presentation">
        <label for="select2">Second list:</label><br>
        <select id="select2" multiple size="7" name="second">
        </select>
    </div>
</div>

</body>
</html>