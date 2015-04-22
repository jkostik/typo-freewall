<?php

class ext_update {

    /**
     * The entry function
     * Return : TRUE: updatescript im Extension Manager verfügbar
     * FALSE: updatescript nicht verfügbar
     * Damit kann z.B. eine Funktion geschrieben werden die nur ein einmaliges Ausführen
     * des Scriptes erlaubt.
     */
    public function access() {
        return TRUE;
    }

    /**
     * Main Function
     *
     * Wird ein Formularwert als POST Parameter erkannt, wird die function writeBackendlayouts aufgerufen
     * Kein POST Prameter: Formular wird angezeigt
     *
     * @return string HTML output
     */
    public function main() {
        $content = "Hallo Zusammen! Ich bin ein UpdateScript!!!";
        $content = $this->formular();
        return $content;
    }

    /**
     * Shows a formular.
     *
     * @return string
     */
    protected function formular() {
        return
            '<form action="' . t3lib_div::getIndpEnv('REQUEST_URI') . '" method="POST">' .
            '<p>This script will do the following:</p>' .
            '<ul>' .
            '<li>Import the backend layouts to your template root pid.</li>' .
            '<li></li>' .
            '</ul>' .
            '<p><b>Warning!</b> All current backend layouts will be removed!</p>' .
            '<br />' .
            'PID of your template root: <input name="templatepid" type="text" size="30" maxlength="40">' .
            '<br /><br />' .
            '<input type="submit" name="nssubmit" value="Update" /></form>';
    }
}