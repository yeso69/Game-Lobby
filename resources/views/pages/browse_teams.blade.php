


<link rel="stylesheet" href="../../../public/css/browse_teams.css">
<link rel="stylesheet" href="../../../public/css/team_card.css">
<script type="text/javascript" src="../../../public/js/browse_teams.js"></script>
<script type="text/javascript" src="../../../public/js/team_card.js"></script>

<div class="col-lg-10" id="browse_teams">
    <?php for ($i=0; $i<6; $i++){ ?>
        <div class="col-lg-6">
            <?php include '../../assets/fragments/team_card.blade.php'; ?>
        </div>
    <?php } ?>
</div>