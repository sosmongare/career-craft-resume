<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Template;
use PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::all();
    
        if ($resumes->isEmpty()) {
            return response()->json([
                'message' => 'No resumes found',
                'data' => []
            ], 200);
        }
    
        return response()->json([
            'message' => 'Resumes retrieved successfully',
            'data' => $resumes
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'template_id' => 'required|exists:templates,id',
            'data' => 'required|array',
            'data.name' => 'required|string',
            'data.contact_info' => 'required|array',
            'data.contact_info.address' => 'required|string',
            'data.contact_info.linkedin' => 'required|url',
            'data.contact_info.email' => 'required|email',
            'data.contact_info.mobile_number' => 'required|string',
            'data.contact_info.github' => 'required|url',
            'data.career_objectives' => 'required|string',
            'data.work_experience' => 'required|array',
            'data.work_experience.*.title' => 'required|string',
            'data.work_experience.*.company' => 'required|string',
            'data.work_experience.*.location' => 'required|string',
            'data.work_experience.*.start_date' => 'required|string',
            'data.work_experience.*.end_date' => 'required|string',
            'data.education' => 'required|array',
            'data.education.*.degree' => 'required|string',
            'data.education.*.institution' => 'required|string',
            'data.education.*.location' => 'required|string',
            'data.education.*.start_date' => 'required|string',
            'data.education.*.end_date' => 'required|string',
            'data.skills' => 'required|array',
            'data.projects' => 'required|array',
            'data.projects.*.title' => 'required|string',
            'data.projects.*.description' => 'required|string',
            'data.references' => 'required|array',
            'data.references.*.name' => 'required|string',
            'data.references.*.contact' => 'required|string',
            'data.references.*.email' => 'required|email',
            'data.custom_sections' => 'sometimes|array',
            'data.custom_sections.*' => 'required|array',
            'data.custom_sections.*.*.title' => 'required|string',
            'data.custom_sections.*.*.description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resume = new Resume();
        $resume->user_id = '1'; //Auth::id();
        $resume->template_id = $request->template_id;
        $resume->data = $request->data;
        $resume->save();

        return response()->json($resume, 201);
    }

    public function update(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'template_id' => 'sometimes|exists:resumes,id',
            'data' => 'required|array',
            'data.name' => 'required|string',
            'data.contact_info' => 'required|array',
            'data.contact_info.address' => 'required|string',
            'data.contact_info.linkedin' => 'required|url',
            'data.contact_info.email' => 'required|email',
            'data.contact_info.mobile_number' => 'required|string',
            'data.contact_info.github' => 'required|url',
            'data.career_objectives' => 'required|string',
            'data.work_experience' => 'required|array',
            'data.work_experience.*.title' => 'required|string',
            'data.work_experience.*.company' => 'required|string',
            'data.work_experience.*.location' => 'required|string',
            'data.work_experience.*.start_date' => 'required|string',
            'data.work_experience.*.end_date' => 'required|string',
            'data.education' => 'required|array',
            'data.education.*.degree' => 'required|string',
            'data.education.*.institution' => 'required|string',
            'data.education.*.location' => 'required|string',
            'data.education.*.start_date' => 'required|string',
            'data.education.*.end_date' => 'required|string',
            'data.skills' => 'required|array',
            'data.projects' => 'required|array',
            'data.projects.*.title' => 'required|string',
            'data.projects.*.description' => 'required|string',
            'data.references' => 'required|array',
            'data.references.*.name' => 'required|string',
            'data.references.*.contact' => 'required|string',
            'data.references.*.email' => 'required|email',
            'data.custom_sections' => 'sometimes|array',
            'data.custom_sections.*' => 'required|array',
            'data.custom_sections.*.*.title' => 'required|string',
            'data.custom_sections.*.*.description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resume->template_id = $request->template_id ?? $resume->template_id;
        $resume->data = $request->data;
        $resume->save();

        return response()->json($resume, 200);
    }

    public function show($id)
    {
        $resume = Resume::findOrFail($id);
        $template = Template::findOrFail($resume->template_id);
        $data = $resume->data;

        $pdf = PDF::loadView('templates.basic',compact('data'));
        return $pdf->download('resume.pdf');
    }


    public function downloadPDF($id)
    {
        $resume = Resume::findOrFail($id);
        $template = Template::findOrFail($resume->template_id);
        $data = $resume->data;

        $pdf = PDF::loadView('templates.basic', compact('data'));
        return $pdf->download('resume.pdf');
    }
}
