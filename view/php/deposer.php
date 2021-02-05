<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- mon css -->
    <link href="../css/css.css" rel="stylesheet" />
    <!-- titre -->
    <title>Deposer votre annonce</title>

    <!-- DEBUT -->
</head>

<body>
    <!--  logo -->
    <br /><br />
    <div class="container">
        <div>
        <img class="img-fluid mx-auto d-block" src="AimsMercato.jpg" alt="logo" width="25%">
        </div>
    </div>
    <br />

    <!-- formulaire -->

    <div class="container">
        <div class="card border-5 shadow my-5 bg-primary">
            <div class="card-body p-5">
                <div class="text-center">
                    <form action="creation.php" method="POST" enctype="multipart/form-data" >
                        <br />

                        <label><h3>nom</h3></label><br />
                        <input type="text" name="nom" placeholder="nom" required pattern="[A-Za-z]{2,20}" maxlength="20" /><br /><br />

                        <label><h3>nationalité</h3></label><br />

                        <select name="nationalite"  required>
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

                        <label><h3>age</h3></label><br />
                        <select name="age" required>
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
                        </select><br /><br />

                        <label><h3>poste</h3></label><br />
                        <select name="poste" required>
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

                        <label><h3>email</h3></label><br />
                        <input type="email" name="email" placeholder="email@" required /><br /><br />

                        <label><h3>photo</h3></label><br /><br />
                        <input name="photo" type="file" />

                        <input type="submit" value="enregistrer" name="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <a type="button" class="btn btn-primary me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 40px" href="index.php">Retour</a>
        </div>
    </div>
    <br>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>