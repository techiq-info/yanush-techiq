<?php
defined('ABSPATH') || defined('DUPXABSPATH') || exit;
/* passed values */
/* @var $recoverPackage DUP_PRO_Package_Recover */

if (!$recoverPackage instanceof DUP_PRO_Package_Recover) {
    return false;
}
?><html>
    <body>
        <h2><?php printf(DUP_PRO_U::__('Recovery package launcher create on %s'), $recoverPackage->getCreated()); ?></h2>
        <p>
            <?php
            printf(DUP_PRO_U::__('If the installer does not start automatically, '
                    .'you can click on this <a href="%s" >link and start it manually</a>.'), esc_url($recoverPackage->getInstallLink()));
            ?>
        </p>
    </body>
    <script>
        window.location.href = <?php echo json_encode($recoverPackage->getInstallLink()); ?>;
    </script>
</html>