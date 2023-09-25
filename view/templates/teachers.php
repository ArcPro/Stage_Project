<?php 
require_once "../../config.php";
require_once "header.php";
session_start();
if (!isset($_SESSION["user_id"])) {
  header('Location: ../../index.php');
}
$authController = new AuthController();
$classroomController = new ClassroomController();
$companyController = new CompanyController();

if (isset($_POST["logout"])) {
  $authController->logout();
  header('Location: ../../index.php');
}

if ($_SESSION["user_permission"] == 0) {
  echo '
  <div class="modal fade" id="confirmPass-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog">
      <form class="modal-content" method="post">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modification du mot de passe</h1>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="" value="" required="">
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Confirmez le mot de passe</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="" value="" required="">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Confirmer" name="submit">
        </div>
      </form>
    </div>
  </div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST["submit"])) {
    if (isset($_POST["password"]) && isset($_POST["confirmPassword"])) {
      if ($authController->editPassword($_SESSION["user_email"], $_POST["password"])) {
        $_SESSION["user_permission"] = 1;
        header('Location: ../../index.php');
      }
    }
  }
  else if (isset($_POST["submitCompany"])) {
    if (isset($_POST["name"]) && isset($_POST["city"]) && isset($_POST["arrondissement"]) && isset($_POST["sector"])) {
      $companyController->createNewCompany(htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["city"]), htmlspecialchars($_POST["arrondissement"]), htmlspecialchars($_POST["sector"]));
    }
  }
  else if (isset($_POST["editSubmitCompany"])) {
    if (isset($_POST["editId"]) && isset($_POST["editName"]) && isset($_POST["editCity"]) && isset($_POST["editArrondissement"]) && isset($_POST["editSector"])) {
      $companyController->editCompany(htmlspecialchars($_POST["editId"]), htmlspecialchars($_POST["editName"]), htmlspecialchars($_POST["editCity"]), htmlspecialchars($_POST["editArrondissement"]), htmlspecialchars($_POST["editSector"]));
    }
  }
  else if (isset($_POST["deleteSubmitCompany"])) {
    if (isset($_POST["deleteId"])) {
      $companyController->deleteCompany(htmlspecialchars($_POST["deleteId"]));
    }
  }
}
?>

<script>$(document).ready(function() {
  $('#confirmPass-modal').modal('show');
});

function deleteCompany(company) {
  console.log(company)
  document.getElementById("deleteId").value = company.ID_Entreprise
  document.getElementById("deleteCompanyText").innerHTML = "Êtes-vous sûr de vouloir supprimer " + company.Nom_Entreprise + " ?"
}

function editCompany(company) {
  console.log(company)
  document.getElementById("editId").value = company.ID_Entreprise
  document.getElementById("editName").value = company.Nom_Entreprise
  document.getElementById("editCity").value = company.Ville
  document.getElementById("editArrondissement").value = company.Arrondissement
  document.getElementById("editSector").value = company.Secteur_Activite
}


</script>
<head>
    <title>Entreprises</title>
  <link href="../../assets/css/dashboard.css" rel="stylesheet">
  <link href="../../assets/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
  
</head>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
      <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
    </symbol>
  </svg>

    
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="calendar3" viewBox="0 0 16 16">
    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"></path>
    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
  </symbol>
  <symbol id="cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
  </symbol>
  <symbol id="chevron-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
  </symbol>
  <symbol id="door-closed" viewBox="0 0 16 16">
    <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"></path>
    <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"></path>
  </symbol>
  <symbol id="file-earmark" viewBox="0 0 16 16">
    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"></path>
  </symbol>
  <symbol id="file-earmark-text" viewBox="0 0 16 16">
    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"></path>
    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"></path>
  </symbol>
  <symbol id="gear-wide-connected" viewBox="0 0 16 16">
    <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"></path>
  </symbol>
  <symbol id="graph-up" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"></path>
  </symbol>
  <symbol id="house-fill" viewBox="0 0 16 16">
    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"></path>
    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"></path>
  </symbol>
  <symbol id="list" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
  </symbol>
  <symbol id="people" viewBox="0 0 16 16">
    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"></path>
  </symbol>
  <symbol id="plus-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
  </symbol>
  <symbol id="puzzle" viewBox="0 0 16 16">
    <path d="M3.112 3.645A1.5 1.5 0 0 1 4.605 2H7a.5.5 0 0 1 .5.5v.382c0 .696-.497 1.182-.872 1.469a.459.459 0 0 0-.115.118.113.113 0 0 0-.012.025L6.5 4.5v.003l.003.01c.004.01.014.028.036.053a.86.86 0 0 0 .27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.86.86 0 0 0 .271-.194.213.213 0 0 0 .039-.063v-.009a.112.112 0 0 0-.012-.025.459.459 0 0 0-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 0 1 9 2h2.395a1.5 1.5 0 0 1 1.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0 1 11.395 14H9a.5.5 0 0 1-.5-.5v-.382c0-.696.497-1.182.872-1.469a.459.459 0 0 0 .115-.118.113.113 0 0 0 .012-.025L9.5 11.5v-.003a.214.214 0 0 0-.039-.064.859.859 0 0 0-.27-.193C8.91 11.1 8.49 11 8 11c-.491 0-.912.1-1.19.24a.859.859 0 0 0-.271.194.214.214 0 0 0-.039.063v.003l.001.006a.113.113 0 0 0 .012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 0 1-.5.5H4.605a1.5 1.5 0 0 1-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238l-.244-2.855zM4.605 3a.5.5 0 0 0-.498.55l.001.007.29 3.4A.5.5 0 0 1 3.9 7.5h-.782c-.696 0-1.182-.497-1.469-.872a.459.459 0 0 0-.118-.115.112.112 0 0 0-.025-.012L1.5 6.5h-.003a.213.213 0 0 0-.064.039.86.86 0 0 0-.193.27C1.1 7.09 1 7.51 1 8c0 .491.1.912.24 1.19.07.14.14.225.194.271a.213.213 0 0 0 .063.039H1.5l.006-.001a.112.112 0 0 0 .025-.012.459.459 0 0 0 .118-.115c.287-.375.773-.872 1.469-.872H3.9a.5.5 0 0 1 .498.542l-.29 3.408a.5.5 0 0 0 .497.55h1.878c-.048-.166-.195-.352-.463-.557-.274-.21-.52-.528-.52-.943 0-.568.447-.947.862-1.154C6.807 10.123 7.387 10 8 10s1.193.123 1.638.346c.415.207.862.586.862 1.154 0 .415-.246.733-.52.943-.268.205-.415.39-.463.557h1.878a.5.5 0 0 0 .498-.55l-.001-.007-.29-3.4A.5.5 0 0 1 12.1 8.5h.782c.696 0 1.182.497 1.469.872.05.065.091.099.118.115.013.008.021.01.025.012a.02.02 0 0 0 .006.001h.003a.214.214 0 0 0 .064-.039.86.86 0 0 0 .193-.27c.14-.28.24-.7.24-1.191 0-.492-.1-.912-.24-1.19a.86.86 0 0 0-.194-.271.215.215 0 0 0-.063-.039H14.5l-.006.001a.113.113 0 0 0-.025.012.459.459 0 0 0-.118.115c-.287.375-.773.872-1.469.872H12.1a.5.5 0 0 1-.498-.543l.29-3.407a.5.5 0 0 0-.497-.55H9.517c.048.166.195.352.463.557.274.21.52.528.52.943 0 .568-.447.947-.862 1.154C9.193 5.877 8.613 6 8 6s-1.193-.123-1.638-.346C5.947 5.447 5.5 5.068 5.5 4.5c0-.415.246-.733.52-.943.268-.205.415-.39.463-.557H4.605z"></path>
  </symbol>
  <symbol id="search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
  </symbol>
</svg>

<div class="modal fade" id="newCompany" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajout d'une entreprise</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required="true">
          </div>
          <div class="col-md-6 mb-3">
            <label for="City">Ville</label>
            <input type="text" class="form-control" id="city" name="city" required="true">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Arr">Arrondissement</label>
            <input type="text" class="form-control" id="arrondissement" name="arrondissement" required="true">
          </div>
          <div class="col-md-6 mb-3">
            <label for="Sector">Secteur d'activité</label>
            <input type="text" class="form-control" id="sector" name="sector" required="true">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-success" value="Confirmer" name="submitCompany">
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editCompany" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier une entreprise</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="hidden" name="editId" id="editId" value="id">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Name">Nom</label>
            <input type="text" class="form-control" id="editName" name="editName" required="true">
          </div>
          <div class="col-md-6 mb-3">
            <label for="City">Ville</label>
            <input type="text" class="form-control" id="editCity" name="editCity" required="true">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Arr">Arrondissement</label>
            <input type="text" class="form-control" id="editArrondissement" name="editArrondissement" required="true">
          </div>
          <div class="col-md-6 mb-3">
            <label for="Sector">Secteur d'activité</label>
            <input type="text" class="form-control" id="editSector" name="editSector" required="true">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-success" value="Modifier" name="editSubmitCompany">
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="deleteCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer une entreprise</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="hidden" name="deleteId" id="deleteId" value="id">
      <div class="modal-body" id="deleteCompanyText">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-danger" value="Supprimer" name="deleteSubmitCompany">
      </div>
    </form>
  </div>
</div>

<div class="modal fade show" id="showCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form class="modal-content" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="exampleModalXlLabel">Informations</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </form>
  </div>
</div>

<!-- MODALS -->


<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Gestion de stages</a>

  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi"><use xlink:href="#search"></use></svg>
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"></use></svg>
      </button>
    </li>
  </ul>

  <div id="navbarSearch" class="navbar-search w-100 collapse">
    <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="height:939px;">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="dashboard.php">
                <svg class="bi"><use xlink:href="#house-fill"></use></svg>
                Accueil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="students.php">
                <svg class="bi"><use xlink:href="#people"></use></svg>
                Étudiants
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="teachers.php">
                <svg class="bi"><use xlink:href="#people"></use></svg>
                Professeurs
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" href="company.php">
                <svg class="bi"><use xlink:href="#graph-up"></use></svg>
                Entreprises
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark"></use></svg>
                Documents
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#puzzle"></use></svg>
                Stages
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Documents récents</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <svg class="bi"><use xlink:href="#plus-circle"></use></svg>
            </a>
          </h6>
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                Year-end sale
              </a>
            </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"></use></svg>
                Paramètres
              </a>
            </li>
            <form class="nav-item" method="post">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#door-closed"></use></svg>
                <input class="nav-link" style="margin-left:-15px;" type="submit" name="logout" value="Se déconnecter">
              </a>
            </form>
          </ul>
        <?php
        if ($_SESSION["user_permission"] == 2) {
            echo '<hr class="my-3">

            <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="admin.php">
                  <svg class="bi"><use xlink:href="#gear-wide-connected"></use></svg>
                  Administration
                </a>
              </li>
            </ul>';
        }
        ?>
          
        </div>
      </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Accueil</h1>
        </div>
        <nav id="navbar-example2" class="navbar navbar-light bg-white px-3">
            <?php 
            $companies = $companyController->getAllCompanies();
            $perPage = 15; 
            $page = isset($_GET['page']) ? $_GET['page'] : 1; 
            $totalCompanies = count($companies);
            $totalPages = ceil($totalCompanies / $perPage);
            $offset = ($page - 1) * $perPage;
  
            $count = ($page - 1) * $perPage + 1; // Calcul du compteur en fonction de la page
  
            // Obtenez un sous-ensemble d'étudiants pour cette page
            $companiesPerPage = array_slice($companies, $offset, $perPage);
            $result = '';
  
            foreach ($companiesPerPage as $company) {
              $result = $result . '
                <tr id="'.$count.'">
                    <th scope="row">'.$count.'</th>
                    <td>'.$company["Nom_Entreprise"].'</td>
                    <td>'.$company["Ville"].'</td>
                    <td>'.$company["Arrondissement"].'</td>
                    <td>'.$company["Secteur_Activite"].'</td>
                    <td>
                      <ul class="list-inline m-0">
                        <li class="list-inline-item">
                          <button type="button" class="btn btn-primary btn-sm rounded-0" data-toggle="tooltip" data-bs-toggle="modal" data-placement="top" data-original-title="Montrer" data-bs-target="#showCompany" onclick=\'showCompany('.json_encode($company).')\'><i class="fa fa-table"></i></button>
                        </li>
                        <li class="list-inline-item">
                          <button type="button" class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-bs-toggle="modal" data-placement="top" data-original-title="Modifier" data-bs-target="#editCompany" onclick=\'editCompany('.json_encode($company).')\'><i class="fa fa-edit"></i></button>
                        </li>
                        <li class="list-inline-item">
                          <button type="button" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-bs-toggle="modal" data-placement="top" data-original-title="Supprimer" data-bs-target="#deleteCompany" onclick=\'deleteCompany('.json_encode($company).')\'><i class="fa fa-trash"></i></button>
                        </li>
                      </ul>
                    </td>
                </tr>
                ';
                $count++;
                // $student["ID_Etudiant"]
            }

            echo '<ul class="navbar-brand pagination pagination-sm" style="box-shadow:none;background-color:white;">';
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo '<li class="page-item active" aria-current="page"><a class="page-link" style="background-color:#198754; border-color:#157347;" href="?page='.$i.'  ">' . $i . '</a></span>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">' . $i . '</a></li>';
                }
            }
            echo '</ul>';?>
            <button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#newCompany">
                Ajouter
              </button>
          </nav>
        <div class="bd-example">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Ville</th>
              <th scope="col">Arrondissement</th>
              <th scope="col">Secteur d'activité</th>
              <th scope="col">Options</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          echo $result;
          ?>
          </tbody>
        </table>
        </div>
        
        <canvas class="my-4 w-100" style="display: block; box-sizing: border-box; height: 73px;"></canvas>
    </main>
  </div>
</div>

</body>

<!-- row.innerHTML = '<form method="post"><th scope="row">'+ id +'</th> <td><input type="text" style="width:120px;" class="form-control form-control-sm" name="updateLastname" required></td> <td><input type="text" style="width:100px;" class="form-control form-control-sm" name="updateFirstname" required></td> <td><input style="width:200px;" type="text" class="form-control form-control-sm" name="updateAddress"></td> <td><input type="phone" class="form-control form-control-sm" style="width:120px;" name="updatePhone" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" placeholder="06 XX XX XX XX" required></td> <td><input type="email" class="form-control form-control-sm" name="updateEmail" style="width:200px;" required></td> <td><select name="updateClasse" style="width:90px;margin-top:2.5px;">'+result+'</select></td><input type="hidden" name="id" value="'+idUser+'"><input class="btn btn-success" style="height:48px;width:50px;" value="OK" type="submit" name="submitUpdate"></form></tr>'; -->
