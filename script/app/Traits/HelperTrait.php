<?php

namespace App\Traits;

use App\Notification;
use Carbon\Carbon;
use Exception;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

trait HelperTrait
{
    /**
     * sends notification.
     *
     *
     * @param integer $parent_id
     * @param string $body
     *
     * @return null
     */
    public function saveNotification($parent_id, $body, $link)
    {
        $notification = new Notification();
        $notification->user_id = Auth::User()->id;
        $notification->parent_id = $parent_id;
        $notification->body = $body;
        $notification->link = $link;
        $notification->save();
        
    }  
}
