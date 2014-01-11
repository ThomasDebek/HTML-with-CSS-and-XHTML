<? 
  @ini_set( 'display_errors', 0 ); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
    <title>Kafeteria Świat Kaw - Ziarnotron - Obsługa zamówienia</title>
  </head>
  <body>

    <h1>Kafeteria Świat Kaw - Ziarnotron - Obsługa zamówienia</h1>

<?
  $personalia = ('' != $_REQUEST['personalia']) 
                  ? $_REQUEST['personalia']
                  : 'Bezimienny Internauto';
  
  $brakPersonaliow = ('' == $_REQUEST['personalia']);
  $brakAdresu = '' == $_REQUEST['adres'] ||
                '' == $_REQUEST['miejscowosc'] ||
                '' == $_REQUEST['wojewodztwo'] ||
                '' == $_REQUEST['kodpocztowy'];
  
  $inneBraki  = '' == $_REQUEST['gatunek'] ||
                '' == $_REQUEST['typziaren'];
  
  $brakiTeksty = array();
  $brakiTekst  = '';
  
  if ($brakPersonaliow) 
    $brakiTeksty[] = 'swojego imienia i nazwiska';
  if ($brakAdresu) 
    $brakiTeksty[] = 'swojego adresu';
  if ('' == $_REQUEST['gatunek']) 
    $brakiTeksty[] = 'gatunku kawy';
  if ('' == $_REQUEST['typziaren']) 
    $brakiTeksty[] = 'typu ziaren';
  
  foreach ($brakiTeksty as $indx => $tekst) {
    $lacznik = ($indx+1 == count( $brakiTeksty )) ? ' ani ' : ', ';
    $brakiTekst .= ('' != $brakiTekst ? $lacznik : '') . $tekst;
  }
  
  $brakiTekst .= ' ';
  
  $katalog    = in_array( 'katalog', $_REQUEST['dodatki'] );
  $opakowanie = in_array( 'opakowanie', $_REQUEST['dodatki'] );
  
  $dodatki = '';
  if ($opakowanie) $dodatki .= ' w ozdobnym opakowaniu';
  if ($katalog)    $dodatki .= ('' != $dodatki ? ' i ' : '') . ' z dołączonym katalogiem';
  
  if ('' != $dodatki) $dodatki = ', ' . $dodatki . ', ';
?>    


Cześć <?= $personalia ?>, dziękujemy 

<? if ($brakPersonaliow || $brakAdresu || $inneBraki) : ?>
  
  za zainteresowanie... musisz jednak uzupełnić formularz, ponieważ nie podałeś 
  <?= $brakiTekst ?>. Powinieneś zatem klikniąć w swojej przeglądarce przycisk "Wstecz"
  i uzupełnić formularz Ziarnotronu. Spróbuj jeszcze raz - nasze kawy są tego warte!
  <br>
  <br>
  Na razie przesłałeś następujące informacje: <br>
  
  <? if ('' != $_REQUEST['gatunek']) : ?>
  <b>Gatunek:</b> <?= $_REQUEST['gatunek'] ?> <br />
  <? endif; ?>
  <? if ('' != $_REQUEST['typziaren']) : ?>
  <b>Typ ziaren:</b> <?= $_REQUEST['typziaren'] ?> <br />
  <? endif; ?>
  <? if ('' != $_REQUEST['personalia']) : ?>
  <b>Imię i nazwisko:</b> <?= $_REQUEST['personalia'] ?> <br />
  <? endif; ?>
  <? if ('' != $_REQUEST['adres']) : ?>
  <b>Adres:</b>           <?= $_REQUEST['adres'] ?><br />
  <? endif; ?>
  <? if ('' != $_REQUEST['miejscowosc']) : ?>
  <b>Miejscowość:</b>     <?= $_REQUEST['miejscowosc'] ?><br />
  <? endif; ?>
  <? if ('' != $_REQUEST['wojewodztwo']) : ?>
  <b>Województwo:</b>     <?= $_REQUEST['wojewodztwo'] ?><br />
  <? endif; ?>
  <? if ('' != $_REQUEST['kodpocztowy']) : ?>
  <b>Kod pocztowy:</b>    <?= $_REQUEST['kodpocztowy'] ?><br />
  <? endif; ?>
  
<? else : ?>

  za skorzystnie z naszego Ziarnotronu i złożenie zamówienia.
  <br>
  <br>
  Zamówienie na 
  <? if ('mielona' == $_REQUEST['typziaren']) : ?>  
    zmieloną kawą
  <? else: ?>
    ziarna kawy
  <? endif; ?>  
  gatunku "<?= $_REQUEST['gatunek'] ?>"<?= $dodatki ?> zostanie wysłane na adres:<br>
  <div style='font-style:italic'>
    <?= $_REQUEST['personalia'] ?> <br />
    <?= $_REQUEST['adres'] ?><br />
    <?= $_REQUEST['miejscowosc'] ?><br />
    <?= $_REQUEST['wojewodztwo'] ?><br />
    <?= $_REQUEST['kodpocztowy'] ?><br />
  </div>
  
  <? if ('' != $_REQUEST['komentarz']): ?>
  <br>
  A oto co dodatkowo napisałeś:<br>
  <?= $_REQUEST['komentarz'] ?>
  <? endif; ?>
  
<? endif; ?>

  </body>
</html>

