<?php
function uploadImage(string $file_name, string $tmp_name, string $directory, string $nom_fichier)
{


    $ext = explode('.', $tmp_name);
    $ext = $ext[count($ext) - 1];
    if (extensionImage($ext)) {
        $tmp_name = $nom_fichier . '.' . $ext;
        if (file_exists($directory . $tmp_name)) {
            return false;
        } else {

            move_uploaded_file($file_name, $directory . $tmp_name);
            return true;
        }
    } else {
        return false;
    }
}
function extensionImage(string $extension)
{
    $tab_ext = ['jpg', 'jpeg', 'png', 'gif'];

    for ($i = 0; $i < count($tab_ext); $i++) {
        if ($tab_ext[$i] == $extension) {
            return true;
        }
        return false;
    }
}
