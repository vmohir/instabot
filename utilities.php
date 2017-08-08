<?php 
function contains_word($source, $find)
{
    if (strpos($source, $find) !== false) {
        return true;
    }

    return false;
}

function emoji($text){
    $emoji = [
        'laugh' => '😂',
        'poker' => '😐',
        ':D' => '😁',
        'thinking' => '🤔',
        'like' => '👍',
        'exact' => '👌',
        'hand' => '✋',
        'facepalm' => '😑',
        'dislike' => '👎',
        'image-icon' => '🖼',
        'game' => '🎮',
        'desktop' => '🖥',
        'electricity' => '💡',
        'mobile' => '📱',
        'web' => '🌎',
        'design' => '🎨',
        'checked' => '✅',
        'not_checked' => '◻️',
        'alert' => '⚠️',
        'food-plate' => '🍛',
        'food-tray' => '🍱',
        'plate' => '🍽',
        'chicken-wing' => '🍗',
        'pizza' => '🍕' ,
        'burger' => '🍔',
        'breakfast' => '🍳',
        'dinner' => '🍝',
        'soup' => '🍜',
    ];
    return $emoji[$text];
}
