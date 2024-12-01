<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TwoFactorController extends Controller
{
    /**
     * Generate two-factor authentication code and email it to the user.
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        /**
         * Generate two-factor authentication code and save it
         * to the users database table for the logged-in user.
         */
        $user = auth()->user();
        $code = rand(100000, 999999);
        $user->two_factor_code = $code;
        $user->save();

        /**
         * Email the two-factor authentication code to the
         * logged-in user.
         */
        Mail::raw("Your two factor authentication code is: $code", function ($message) use ($user) {
            $message->to($user->email)->subject("Your two factor authentication code");
        });

        /**
         * View the two-factor authentication challenge page.
         */
        return view('auth.two-factor');
    }

    /**
     * Verify the inputted two-factor authentication code.
     * @param Request $request
     * @return RedirectResponse
     */
    public function verify(Request $request): RedirectResponse
    {
        /**
         * Validate the two-factor authentication code from the form.
         */
        $request->validate([
            'code' => 'required|integer',
        ]);

        $user = auth()->user();

        /**
         * If the inputted code is correct, redirect the user to the dashboard.
         */
        if ($request->code == $user->two_factor_code) {
            session(['two_factor_authenticated' => true]);
            return redirect()->intended('/dashboard');
        }

        $errorMessage = "The two factor authentication code was incorrect. A new one has been emailed to you.";
        return redirect()->route('two-factor.index')->withErrors(['code' => $errorMessage]);
    }
}
