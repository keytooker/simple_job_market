<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Joboffer;
use App\User;
use App\Respond;

class JobofferController
{
    /**
     * Добавление пользователем со статусом "заказчик" новой вакансии в систему
     */
    public function newoffer(Request $request)
    {
        if ( $request->isMethod('post') ) {
            $joboffer = new Joboffer;
            $joboffer->title = $request->input('title');
            $joboffer->offertext = $request->offer;

            if (Auth::check()) {
                $customer_id = Auth::user()->id;
                if (User::isCustomer($customer_id)) {
                    $joboffer->customer_id = $customer_id;
                }
            }

            $joboffer->save();
        }

        if (Auth::check()) {
            $customer_id = Auth::user()->id;
            if (User::isCustomer($customer_id)) {
                return view('fl.joboffer', ['auth' => true]);
            }
        }
        return view('fl.joboffer');
    }

    /**
     * Показывает страницу с полной информацией по вакансии
     */
    public function getOffer( Request $request, $offerId )
    {
        $offer = Joboffer::findorfail($offerId);
        $message = $request->session()->get('status'); // выведется только один раз

        $responds = Respond::whereOffer_id($offerId)
            ->leftJoin('users', 'users.id', '=', 'responds.contractor_id')
            ->get();


        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if (User::isContractor($user_id)) {
                return view('fl.offer', [ 'offer' => $offer, 'contractor_id' => $user_id, 'message' => $message,
                    'responds' => $responds, 'auth' => true ]);
            }
            else {
                // Проверяю, является авторизованный в данный момент пользователем автором этой вакансии
                $isAuthor = ($user_id == $offer->customer_id);
                return view('fl.offer', [ 'offer' => $offer, 'user_id' => $user_id, 'message' => $message,
                    'responds' => $responds, 'isAuthor' => $isAuthor, 'auth' => true ]);
            }
        }

        return view('fl.offer', ['offer' => $offer]);
    }

    /**
     *  Обработка нажатия фрилансером кнопки "Откликнуться на вакансию" на странице вакансии
     */
    public function proccessRespond( Request $request, $offerId )
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if (User::isContractor($user_id)) {
                $respond = new Respond;
                $respond->offer_id = $offerId;
                $respond->letter = $request->respondtext;
                $respond->contractor_id = $user_id;
                $respond->save();
                $request->session()->flash('status', 'Ваше отклик на вакансию принят. Заказчик будет оповещен о нем.');
            }
        }

        return redirect('/job/' . $offerId);
    }
}
