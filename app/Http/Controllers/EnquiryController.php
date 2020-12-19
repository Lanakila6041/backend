<?php
namespace App\Http\Controllers;
use App\Models\Enquiry_types;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        return Enquiry_types::all();
    }
    public function createEnquiry(Request $request)
    {
        $enquiry = new Enquiry_types();
        $enquiry->name = $request->input('name');
        $enquiry->code = $request->input('code');
        $enquiry->description = $request->input('description');
        $enquiry->keywords = $request->input('keywords');
        $enquiry->parent_id = $request->input('parent_id');
        $enquiry->sort = $request->input('sort');
        $enquiry->enquiry_key = $request->input('enquiry_key');
        $enquiry->created_user = $request->input('created_user');
        $enquiry->modified_user = $request->input('modified_user');
        $enquiry->is_show = $request->input('is_show');
        $enquiry->created_at = $request->input('created_at');
        $enquiry->updated_at = $request->input('updated_at');

        $enquiry->save();
        return $enquiry;
    }
  
}
