<?php
require_once(__DIR__ . "/../entities/Quote.php");

function quoteForm($params = array())
{
    $quote = isset($params["quote"]) ? $params["quote"] :   $quote = Quote::fromForm("", "", "", "");
    $errors = isset($params["errors"]) ? $params["errors"] :   array("", "", "", "");

?>

    <main>
        <h2>Formulaire de création de citations</h1>
            <form method="post" name="FrameCitation" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                <div class="form-section">
                    <label for="login">Login*</label>
                    <input name="login" maxlength="64" size="6" value="<?php echo $_SESSION["login"] ?>" disabled>
                    <p class="form-error"><?php echo $errors[1] ?></p>
                </div>
                <div class="form-section">

                    <label for="citation">Citation*</label>
                    <textarea minlength="10" cols="128" rows="5" name="citation"><?php echo $quote->get_quote(); ?></textarea>
                    <p class="form-error"><?php echo $errors[3] ?></p>
                </div>
                <div class="form-section">
                    <label for="auteur">Auteur*</label>
                    <input name="auteur" maxlength="128" size="64" value="<?php echo $quote->get_author(); ?>">
                    <p class="form-error"> <?php echo $errors[0] ?></p>

                </div>
                <div class="form-section">
                    <label for="date-citation">Date*</label>
                    <input name="date-citation" type="date" value="<?php echo strlen($quote->get_date()) > 0 ? $quote->get_date() : date('Y-m-d') ?>">
                    <p class="form-error"> <?php echo $errors[2] ?></p>
                </div>
                <div class="form-section button-ctr">
                    <button name="Envoyer" type="submit">Enregistrer la citation</button>
                    <button name="Effacer" type="reset">Annuler</button>
                </div>
                </tbody>
                </table>
            </form>
    </main>

<?php } ?>