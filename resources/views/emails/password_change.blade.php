@component('mail::message')
# NEW PASSWORD CREATED

Dear {{$adminType}},

The password associated with your TDFS Pet Food Selector account has recently been changed.

If you did not carry out this activity, please contact us immediately through profiles@thedogfoodshop.com or proceed to change your current password.

<p>Warm regards,<br>
    {{ config('app.name') }} Team
</p>

<p style="font-size:12px; text-align:center; padding-top:20px;">
    <em>This is a system generated email sent from a no-reply, email address.</em>
</p>
@endcomponent
