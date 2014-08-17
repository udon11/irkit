<html>
<head>
<title>HomeControler</title>
<link rel="apple-touch-icon" href="icon.png" />
<meta name="viewport" content="minimal-ui">
<style type="text/css">
<!--
*{
    font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
}
#grid {
    #margin: 0;
    #padding: 0;
    #max-width: 100%;
}
ul{
    margin: 0 0 0 1em;
    padding: 0;
}
li{ 
    margin: 11; 
    float: left;
    list-style: none;
}
.btn {
    text-decoration: none;
    text-align: center;
    display: block;
    border: 1px solid #DDD;
    border-radius: 8px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    color: #eceffd;
    background-color: #041a22; 
    font-size: 40px;
    width: 210;
    padding: 73 0;
}
.hour {
    margin: 10 70; 
    font-size: 30px;
}
#light{
    background-color: #33474e; 
}
#airCtrl{
    background-color: #4e8090; 
}
#fan{
    background-color: #429cb9; 
}
table{
    width: 100%;
    border: none;
}
.title{
    #text-indent: 0.7em;
    text-align: center;
    padding: 20 0 0 0;
    font-size: 50px;
    color: #2f353b;
    border-bottom: 1px solid #ccc;
}
.bottomBorder{
    #border-bottom: 1px solid #ccc;
}
-->
</style>
</head>

<body>
<table border=2 rules=none>

<td class=title>All</td>
<tr class=bottomBorder><td>
<ul>
    <li><a class="btn" href="/homeControl/execControl.php?cmds[]=light_on&cmds[]=fan_power&cmds[]=air_on">ON</a></li>
    <li><a class="btn" href="/homeControl/execControl.php?cmds[]=light_off&cmds[]=fan_power&cmds[]=air_off">OFF</a></li>
    <li><a class="btn" href="/homeControl/execControl.php?cmds[]=fan_timer&cmds[]=fan_timer&cmds[]=fan_timer&cmds[]=fan_light&cmds[]=air_on&cmds[]=light_off">SLEEP</a></li>
</ul>
</td></tr>

<td class=title>Light</td>
<tr class=bottomBorder><td>
<ul>
    <li><a class="btn" id=light href="/homeControl/execControl.php?cmd=light_on">ON</a></li>
    <li><a class="btn" id=light href="/homeControl/execControl.php?cmd=light_off">OFF</a></li>
</ul>
</td></tr>

<td class=title>AirControl</td>
    <option value='JKL'>じぇーけーえる</option>
</select>
</td>
</tr>
<tr class=bottomBorder><td>
<ul>
    <li><a class="btn" id=airCtrl href="/homeControl/execControl.php?cmd=air_on">COOL</a>
    <select class='hour' align=center>
        <option value='1hour'>1 hour</option>
        <option value='3hour' selected>3 hour</option>
        <option value='6hour'>6 hour</option>
    </select></li>
    <li><a class="btn" id=airCtrl href="/homeControl/execControl.php?cmd=air_dry">DRY</a>
    <select class='hour' align=center>
        <option value='1hour'>1 hour</option>
        <option value='3hour' selected>3 hour</option>
        <option value='6hour'>6 hour</option>
    </select></li>
    <li><a class="btn" id=airCtrl href="/homeControl/execControl.php?cmd=air_off">OFF</a></li>
</ul>
</td></tr>

<td class=title>GreenFan</td>
<tr class=bottomBorder><td>
<ul>
    <li><a class="btn" id=fan href="/homeControl/execControl.php?cmd=fan_power">POWER</a></li>
    <li><a class="btn" id=fan href="/homeControl/execControl.php?cmd=fan_up">UP</a></li>
    <li><a class="btn" id=fan href="/homeControl/execControl.php?cmd=fan_down">DOWN</a></li>
    <li><a class="btn" id=fan href="/homeControl/execControl.php?cmd=fan_timer">TIMER</a></li>
    <li><a class="btn" id=fan href="/homeControl/execControl.php?cmd=fan_light">LIGHT</a></li>
</ul>
</td></tr>

</table>
</body>
</html>
