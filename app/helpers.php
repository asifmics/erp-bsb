<?php
/**
 * Created by IntelliJ IDEA.
 * User: Asif
 * Date: 11/18/2020
 * Time: 12:19 PM
 */

function uploadImage($photo,$path)
{
    $imageName = md5(time() . rand() . rand()) . '.' .$photo->getClientOriginalExtension();
    $photo->move($path,$imageName);
    return $imageName;
}
