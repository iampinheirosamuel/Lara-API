<?php

namespace App\Http\Controllers;
use Image;
use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    //post a quote into db
    public function postQuote(Request $request)
	    {
	        if($request->input('image'))
				{
					
					$image = $request->input('image');
					$name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
					\Image::make($request->input('image'))->save(public_path('image').$name);
				
			$quote = new Quote();		 
	        $quote->content = $request->input('content');
	        $quote->title = $request->input('title');
	        $quote->image = 'image'.$name;
			$quote->save();
				
			return response()->json(['quote' => $quote], 200);
				}
	    
	    }
    //retrieves all quotes
    public function getQuotes()
	    {
	        $quotes = Quote::all();
	        $response = [
	            'quotes' => $quotes
	        ];
	        return response()->json($response, 200);
	    }

	//retrieves a quote given an id
    public function getQuote(Request $request, $id)
	    {
	        $quote = Quote::find($id);
	        $response = [
	            'quote' => $quote
	        ];
	        return response()->json($response, 200);
	    }

    //update quote with an id
    public function putQuote(Request $request, $id)
       {
            $quote = Quote::find($id);
			// check if quote is not found
	        if(!$quote)
		        {
		            return response()->json(['message' => 'Quote not found'], 404);
				}
			if($request->input('image'))
				{
					
					$image = $request->input('image');
					$name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
					\Image::make($request->input('image'))->save(public_path('image').$name);
			$quote->content = $request->input('content');
	        $quote->title = $request->input('title');			
			$quote->image = 'image'.$name;
			$quote->save();       
			return response()->json(['quote' => $quote], 200);
				}
		}
    //delete quote with an id
    public function deleteQuote($id)
	    {
	        $quote = Quote::find($id);
	        $quote->delete();
	        return response()->json(['message' => 'Quote deleted'], 200);
	    }
}
