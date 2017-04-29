<h2>CONGES RESTANTS</h2>
<form method="POST">
    <ul class="form_radio">
        <li><input type="radio" name="conges" value="conges_payes" checked>
        <label for="rd1">CONGES PAYES : </label></li><br>
        <li><input type="radio" name="conges" value="anciennete"> <label for="rd2">ANCIENNETE : </label></li><br>
        <li><input type="radio" name="conges" value="rtt"><label for="rd3">RTT : </label></li><br>
        <li><input type="radio" name="conges" value="maladie" ><label for="rd4">MALADIE : </label></li><br>
        <li><input type="radio" name="conges" value="absence_na"><label for="rd5">ABSENCE NON AUTORISEE : </label></li><br>
        <li><input type="radio" name="conges" value="formation"><label for="rd6">FORMATION :</label></li><br>
    </ul>

<!--===============bouton de refus des conges=================-->
    <input id="conges_valides" type="submit" value="CONGES REFUSES"/>

<!--===============bouton de validation des conges=================-->
    <input id="conges_valides" type="submit" value="CONGES VALIDES"/>
</form>

