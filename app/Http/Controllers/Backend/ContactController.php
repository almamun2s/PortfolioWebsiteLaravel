<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Contact::latest()->get();
        return view('admin.contact.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     */
    public function details(Contact $contact)
    {
        if (!$contact->read_at) {
            $contact->read_at = Carbon::now();
            $contact->save();
        }
        return view('admin.contact.details', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        toastr()->info('Message Deleted.');
        return redirect()->route('admin.contact.index');
    }

    public function mark_all_read()
    {
        $messages = Contact::get();
        foreach ($messages as $message) {
            if (!$message->read_at) {
                $message->read_at = Carbon::now();
                $message->save();
            }
        }

        toastr()->info('All Message Marked as read.');
        return redirect()->route('admin.contact.index');
    }

    /**
     * Marking a notification as read
     *
     * @param string $notificationId
     */
    public function notificationMarkAsRead(string $notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('admin.contact.details', $notification->data['contact_id']);
    }

    /**
     * Delete all read notifications
     */
    public function delete_all_notifications()
    {
        $notifications = DatabaseNotification::get();

        foreach ($notifications as $notification) {
            if($notification->read_at){
                $notification->delete();
            }
        }

        toastr()->info('All read Notifications Deleted.');
        return redirect()->route('admin.contact.index');
    }
}
