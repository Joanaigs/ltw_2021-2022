<?php declare(strict_types = 1); ?>

<?php function drawHeader(Session $session) { ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <title>Larica-Food Delivery Website</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/comments.css">
      <script src="javascript/heartDish.js" defer></script>
      <script src="javascript/heart.js" defer></script>
      <script src="javascript/restaurantPage.js" defer></script>
      <script src="javascript/scriptsMealFilter.js" defer></script>
      <script src="javascript/restaurantFilter.js" defer></script>
      <script src="javascript/restaurantSearch.js" defer></script>
      <script src="javascript/scriptFavorites.js" defer></script>
      <script src="javascript/script.js" defer></script>


  </head>
  <body>
    <header>
        <div class="header-left">
            <a href="../main_page.php" class="logo"><i class="fas fa-utensils"></i>Larica</a>
            <section class="search1">
                <div class="search-icon1"></div>
                <div class="input">
                    <input id="searchRest1" type="text" placeholder="Procurar">
                </div>
                <span class="clear1" onclick="document.getElementById('searchRest1').value=''"></span>
            </section>
        </div>
        <nav class="navbar">
            <div class="search2">
                <div class="search-icon2"></div>
                <div class="input">
                    <input id="searchRest2" type="text" placeholder="Procurar restaurantes">
                </div>
                <span class="clear2" onclick="document.getElementById('searchRest2').value=''"></span>
            </div>
            <a class="active" href="../main_page.php">Restaurantes</a>
            <a href="../about.php">Sobre</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <?php if($session->isLoggedIn()){?>
            <a href="../favorites.php" class="fas fa-heart"></a>
            <a href="../profile.php" class="fas fa-user"></a><?php ;}?>
            <a href="../cart.php" class="fas fa-shopping-cart"></a>
            <?php if(!$session->isLoggedIn()){?>
            <button class="login-register-btn" onclick="window.location.href = '../login_register_action.php';">Entrar</button><?php ;}
            else{?>
            <button class="logout-btn" onclick="window.location.href = '../logout_action.php';">Sair</button><?php ;}?>
        </div>
    </header>

  </body>
<?php } ?>

<?php function drawRestViewHeader($id) { ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript/heart.js" defer></script>
    <script src="javascript/orderSelect.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/comments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<header>
    <a href="../main_page.php" class="logo"><i class="fas fa-utensils"></i>Larica</a>
    <nav class="navbar">
        <a href="restView.php?id=<?=$id?>">Menu</a>
        <a href="state.php?id=<?=$id?>">Estado dos Pedidos</a>
        <a href="comments.php?id=<?=$id?>">Avaliações e comentários</a>
    </nav>
    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <a href="../favorites.php" class="fas fa-heart"></a>
        <a href="../profile.php" class="fas fa-user"></a>
        <a href="../cart.php" class="fas fa-shopping-cart"></a>
        <button class="logout-btn" onclick="window.location.href = '../logout_action.php';">Sair</button>
    </div>
</header>
<main>
    <?php } ?>

    <?php function drawFooter() { ?>
        <link rel="stylesheet" href="css/style.css">
        <footer class="credit" id="real">&copy; Larica LTW 2021/2022 - All rights reserved</footer>

    <?php } ?>

<?php function drawAboutUs() { ?>
    <link rel="stylesheet" href="css/style.css">
    <div class="about">
        <div class="about-site">
            <p>
                Somos uma empresa que trabalha com os restaurantes da sua zona, levando os seus pedidos diretamente à sua porta,
                sem ter de mexer algo mais que um dedo.
            </p>
            <h3>
                Como funciona?
            </h3>
        </div>
        <div class="how-to-use">
            <div class="box-container">
                <div class="box">
                    <img src="https://picsum.photos/600/300" alt="burger" class="image" />
                    <h3>Procurar</h3>
                    <p>
                        Larica tem centenas de restaurantes à sua escolha. Quando abre o website, pode procurar um restaurante ou cozinha em particular.
                    </p>
                </div>


                <div class="box">
                    <img src="https://picsum.photos/600/300" alt="burger" class="image" />
                    <h3>Pedir</h3>
                    <p>
                        Quando decidir o que quer encomendar basta tocar no '+' para que o pedido seja adicionado ao seu carrinho de compras.
                        No entanto, apenas poderá realizar pedidos de restaurantes diferentes, separadamente.
                    </p>
                </div>

                <div class="box">
                    <img src="https://picsum.photos/600/300" alt="burger" class="image" />
                    <h3>Pagar</h3>
                    <p>
                        Quando estiver pronto para fazer check-out, irá ver o seu endereço (com possibilidade de modificá-lo para esse pedido específico) e o preço do pedido.
                        Se estiver tudo bem, toque em Checkout e já está.
                    </p>
                </div>
            </div>
        </div>
        <div class="follow">
            <h3>Links</h3>
            <div class="box-container">
                <div class="box">
                    <h3>Links</h3>
                    <a href="../main_page.php">Página inicial</a>
                    <a href="#">Sobre</a>
                    <a href="#">Carrinho</a>
                </div>


                <div class="box">
                    <h3>Contacte-nos</h3>
                    <a href="#">up202007620@edu.fe.up.pt</a>
                    <a href="#">up202007623@edu.fe.up.pt</a>
                    <a href="#">up202006279@edu.fe.up.pt</a>
                </div>

                <div class="box">
                    <h3>Siga-nos</h3>
                    <a href="https://github.com/matildesequeira">GitHub - @matildesequeira</a>
                    <a href="https://github.com/marianaosiecka">GitHub - @marianaosiecka</a>
                    <a href="https://github.com/Joanaigs">GitHub - @Joanaigs</a>
                </div>
            </div>
            <footer id="credit">&copy; Larica LTW 2021/2022 - All rights reserved</footer>
        </div>
    </div>
<?php } ?>

    <?php function drawSidebar($restaurant) { ?>
        <link rel="stylesheet" href="../css/profile.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

            <div class="sidebar">
                <h3>Conta</h3>
                <ul class="sidebar-options">
                    <li class="profile-page"><a href="../profile.php">Perfil de utilizador <i class="fas fa-chevron-right" id="chevron-right"></i></a></li>
                    <li class="last-orders-page"><a href="../latest_orders.php">Pedidos anteriores <i class="fas fa-chevron-right" id="chevron-right"></i></a></li>
                    <?php if($restaurant===false){?>
                    <li class="add-restaurant"><button class="add-restaurant-btn" name="addRestaurantButton" onclick="window.location.href = '../addRestaurant.php';">Adicionar restaurante</button></li>
                    <?php }
                    else{?>
                    <li class="restaurant-page"><button class="restaurant-page-btn" name="restaurantPageButton" onclick="window.location.href = '../restView.php?id=<?=$restaurant->id?>';">Página do restaurante <i class="fas fa-chevron-right" id="chevron-right"></i></button></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

<?php function drawLoginRegisterForm(Session $session) { ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
    <title></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Sign in/Sign up Form</title>
        <link rel="stylesheet" href="../css/login_register.css"/>
    </head>
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin">
                    <form action="../formLoginRegister.php" method="post" class="sign-in-form">
                        <h2 class="title">Iniciar sessão</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="email" placeholder="Email"/>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Palavra-passe"/>
                        </div>
                        <input type="submit" name="LoginButton" class="btn solid" value="Entrar" formmethod="post">
                    </form>
                </div>
                <div class="signup">
                    <form action="../formLoginRegister.php" method="post" class="sign-up-form">
                        <h2 class="title">Crie a sua nova conta</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="username" placeholder="Nome de utilizador" autocomplete="off" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" autocomplete="off" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-phone"></i>
                            <input type="text" name="phoneNumber" placeholder="Número de telemóvel" autocomplete="off" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-home"></i>
                            <input type="text" name="address" placeholder="Morada" autocomplete="off" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-map-pin"></i>
                            <input type="text" name="city" placeholder="Cidade" autocomplete="off" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-flag"></i>
                            <select id="country" name="country" class="form-control">
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal" selected>Portugal </option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Palavra-passe" autocomplete="off" required />
                        </div>
                        <p class="warning">A palavra-passe deve conter no mínimo 5 caracteres e incluir letras e números</p>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password_confirm" placeholder="Confirmar palavra-passe" autocomplete="off" required />
                        <?php $messages = $session->getMessages();
                        foreach($messages as $message) {
                        ?><p <?php $message;
                        }?> </p>
                        </div>
                        <input type="submit" name="RegisterButton" class="btn solid" value="Registar" formmethod="post">
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Não tem conta?</h3>
                    <br>
                    <button id="sign-up-button" class="btn transparent">Criar conta</button>
                </div>
                <img src="../images/pizza_sharing.svg" alt="burger" class="image" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Já tem conta?</h3>
                    <br>
                    <button id="sign-in-button" class="btn transparent">Iniciar sessão</button>
                </div>
            </div>
        </div>
        </div>
    <script src="../javascript/script.js"></script>
    </body>
    </html>
<?php } ?>

