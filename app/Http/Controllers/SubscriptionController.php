<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Subscription;
use App\Models\SubscriptionTrials;

class SubscriptionController extends Controller
{

    public function index()
    {
        return view('/company-home');
    }

    public function showSubscriptionForm()
    {
        return view('/subscribe');
    }

    public function subscribe(Request $request)
    {
    $user = Auth::user();
    Stripe::setApiKey(env('STRIPE_SECRET'));
    // Create a new Stripe customer

    $request->validate([
        'name' => 'required|string|max:255',
        'card_number' => 'required|string',
        'expiry_month' => 'required|string',
        'expiry_year' => 'required|string',
        'cvc' => 'required|string',
    ]);

    $customer = Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'source' => $request->stripeToken,
    ]);

    // Create a new subscription
    $subscription = Subscription::create([
        'customer' => $customer->id,
        'items' => [
            [
                'price' => 'price_1N3Y3bA6dkExbPGE1cY1BHEo', // Replace with your actual price ID
            ],
        ],
        
        'trial_end' => strtotime('+30 days'),
    ]);

    // Save the subscription details to the database
    $user == SubscriptionTrials::create([
        'user_id' => $request->user_id,
        'name' => $request->name,
        'email' => $request->email,
        'stripe_id' => $subscription->id,
        'trial_ends_at' => now()->addDays(30),
    ]);

    return view ('/free-trial-success');
    }

    public function cancelSubscription(Request $request)
    {
    $user = Auth::user();

    // Get the subscription from the database
    $subscription = $user->subscription;

    // Cancel the subscription in Stripe
    $stripeSubscription = Subscription::retrieve($subscription->stripe_id);
    $stripeSubscription->cancel();

    // Update the subscription details in the database
    $subscription->trial_ends_at = null;
    $subscription->ends_at = now();
    $subscription->save();

    return redirect()->route('company.home')->with('success', 'Subscription cancelled successfully!');
    }
}
