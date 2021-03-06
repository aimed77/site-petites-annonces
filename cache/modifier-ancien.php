<?php
require_once('connexiondb.php');

// afficher 

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `test` WHERE `id`=:id';

    // On prépare la requête
    $query = $BDD->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    if(!$produit){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}

// modifier

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['age']) && !empty($_POST['age'])
        && isset($_POST['nationalite']) && !empty($_POST['nationalite'])
        && isset($_POST['poste']) && !empty($_POST['poste'])
        && isset($_POST['email']) && !empty($_POST['email'])
        // && isset($_POST['photo']) && !empty($_POST['photo'])
        ){
        $id = strip_tags($_GET['id']);
        $nom = strip_tags($_POST['nom']);
        $age = strip_tags($_POST['age']);
        $nationalite = strip_tags($_POST['nationalite']);
        $poste = strip_tags($_POST['poste']);
        $email = strip_tags($_POST['email']);
        // $photo = strip_tags($_POST['photo']);


        $sql = "UPDATE `test` SET `nom`=:nom, `age`=:age, `nationalite`=:nationalite, `poste`=:poste, `email`=:email WHERE `id`=:id;";
// , `photo`=:photo
        $query = $BDD->prepare($sql);

        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_STR);
        $query->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
        $query->bindValue(':poste', $poste, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        // $query->bindValue(':photo', $photo, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: test.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `test` WHERE `id`=:id;";

    $query = $BDD->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}
?>

<!-- debut -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modif : <?= $result['nom'] ?></title>
</head>
<body>

<!-- afficher -->

<h1>Nom du Joueur : <?= $produit['nom'] ?></h1>
    <p>ID : <?= $produit['id'] ?></p>
    <p>poste : <?= $produit['poste'] ?></p>
    <p>nationalite : <?= $produit['nationalite'] ?></p>
    <p>age : <?= $produit['age'] ?></p>
    <p>email : <?= $produit['email'] ?></p>
    <p>photo : <br> <br> <img src="<?= $produit['photo'] ?>" width="30%"></p>
    <br><br><br>

<!-- modifier -->


<h1>Formulaire pour modifier : <?= $result['nom'] ?></h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <br />

        <label>nom</label><br>
        <input id="nom" type="text" name="nom" placeholder="nom" required pattern="[A-Za-z]{2,20}" maxlength="20" value="<?= $result['nom'] ?>"><br>
        <br />
        <label>nationalité</label><br />
        <select id="nationalite" name="nationalite" required value="<?= $result['nationalite'] ?>">
        <option value="">choisie ta nationalite</option>
                            <optgroup label="Europe">
                                <option value="angleterre">Angleterre</option>
                                <option value="belgique">Belgique</option>
                                <option value="espagne">Espagne</option>
                                <option value="france">France</option>
                                <option value="portugal">Portugal</option>
                                <option value="suisse">Suisse</option>
                            </optgroup>
                            <optgroup label="Afrique">
                                <option value="algerie">Algérie</option>
                                <option value="benin">Bénin</option>
                                <option value="egypte">Egypte</option>
                                <option value="maroc">Maroc</option>
                                <option value="senegal">Senegal</option>
                                <option value="tunisie">Tunisie</option>
                            </optgroup>
                            <optgroup label="Amerique">
                                <option value="argentine">Argentine</option>
                                <option value="bresil">Bresil</option>
                                <option value="canada">Canada</option>
                                <option value="colombie">Colombie</option>
                            </optgroup>
                        </select><br /><br />

        <label>age</label><br />
        <select id="age" name="age" required value="<?= $result['age'] ?>">
            <option value="">indique ton age</option>
            <!-- <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option> -->
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <!-- <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option> -->
        </select><br><br />

        <label>poste</label><br>
        <select id="poste" name="poste" required value="<?= $result['poste'] ?>">
        <option value="">choisie ton poste</option>
                            <optgroup label="attaquant">
                                <option value="buteur">buteur</option>
                                <option value="ailier">ailier</option>
                            </optgroup>
                            <optgroup label="milieu">
                                <option value="milieu defensif">milieu defensif</option>
                                <option value="milieu offensif">milieu offensif</option>
                            </optgroup>
                            <optgroup label="defenseur">
                                <option value="defenseur central">defenseur central</option>
                                <option value="defenseur droit">defenseur droit</option>
                                <option value="defenseur gauche">defenseur gauche</option>
                            </optgroup>
                            <optgroup label="gardien">
                                <option value="gardien de but">gardien de but</option>
                            </optgroup>
                        </select><br /><br />

        <label>email</label><br />
        <input id="email" type="email" name="email" placeholder="email@" required value="<?= $result['email'] ?>" /><br />
        <br />
        <label>photo</label><br />
        <input id="photo" name="photo" type="file" value="<?= $result['photo'] ?>" /><br />
        <br />
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">

    </form>
</body>
</html>