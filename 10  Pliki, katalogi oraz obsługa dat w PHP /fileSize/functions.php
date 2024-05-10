<?php

function displayFileSize($path)
{
    $size = calculateSize($path);

    if ($size === false) {
        return "<div class='alert alert-danger'>Błąd podczas obliczania rozmiaru.</div>";
    }

    $formattedSize = formatSize($size);

    return "<p>Wyniki:</p>
            <ul>
                <li><strong>Bajty:</strong> $size B</li>
                <li><strong>Kilobajty:</strong> $formattedSize[0] KB</li>
                <li><strong>Megabajty:</strong> $formattedSize[1] MB</li>
                <li><strong>Gigabajty:</strong> $formattedSize[2] GB</li>
            </ul>";
}

function calculateSize($path)
{
    if (is_file($path)) {
        return filesize($path);
    } elseif (is_dir($path)) {
        $totalSize = 0;
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($files as $file) {
            if ($file->isFile()) {
                $totalSize += $file->getSize();
            }
        }
        return $totalSize;
    }
    return false;
}

function formatSize($size)
{
    $kilobytes = $size / 1024;
    $megabytes = $kilobytes / 1024;
    $gigabytes = $megabytes / 1024;

    return array($kilobytes, $megabytes, $gigabytes);
}


