<?php
$link = '/home/u338147728/domains/latoecross.com/public_html/latocross/storage/app/public';
$target = '/home/u338147728/persistent_storage/uploads';

try {
    if (is_link($link)) {
        if (readlink($link) !== $target) {
            @unlink($link);
            @symlink($target, $link);
        }
    } elseif (is_dir($link)) {
        $files = @scandir($link);
        if ($files) {
            foreach ($files as $f) {
                if ($f !== '.' && $f !== '..') {
                    @unlink($link . '/' . $f);
                }
            }
        }
        @rmdir($link);
        @symlink($target, $link);
    } else {
        @symlink($target, $link);
    }
    echo "storage-link-ok\n";
} catch (\Throwable $e) {
    echo "storage-link-warning: " . $e->getMessage() . "\n";
}

exit(0);
