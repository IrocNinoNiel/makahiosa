<?php

namespace App\Http\Controllers\user;

use App\Models\Sarf;
use Illuminate\Http\Request;
use App\Models\FileUserInput;
use App\Models\SpecificObjective;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreSarfRequest;
use App\Http\Requests\UpdateBasicInfoSarf;

class SarfController extends Controller
{
    public function index(){
        return view('user.sarf.sarf');
    }

    public function store(StoreSarfRequest $request) {

        // dd($request->objectives);

        $sarf = Sarf::create($request->validated());

        foreach($request->objectives as $obj) {
            SpecificObjective::create([
                'sarf_id' => $sarf->id,
                'name'=>$obj
            ]);
        }



        if($request->has('files')) {

            $path = public_path('files/'). '/'.$sarf->id;
            $pathDir = 'files/'. '/'.$sarf->id;
            if(!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            foreach($request->file('files') as $file) {
                $fileName = time().rand(1,1000).'.'.$file->extension();
                $file->move($path, $fileName);

                $file1 = $file->getClientOriginalName();
                $filename1 = pathinfo($file1, PATHINFO_FILENAME);
                $extension = pathinfo($file1, PATHINFO_EXTENSION);


                $fileinput = new FileUserInput();

                $fileinput->sarves_id = $sarf->id;
                $fileinput->name = $fileName;
                $fileinput->location = $pathDir;
                $fileinput->truename = $filename1;
                $fileinput->extension = $extension;

                $fileinput->save();




                // FileUserInput::create([
                //     'user_id' => $sarf->id,
                //     'name' => $fileName,
                //     'location' => $pathDir,
                //     'truename' => $filename1,
                //     'extension'=> $extension
                // ]);
            }

            // return redirect()->route('file.index')->with('success','File Uploaded Succesfully');
            return view('user.sarf.sarf')->with('success','Sarf Created');
        }
    }

    public function sarflist() {
        $sarfs = Sarf::where('organization_id','=',Auth::user()->id)->get();
        return view('user.sarf.sarflist')->with('sarfs', $sarfs);
    }

    public function show(Sarf $sarf) {
        return view('user.sarf.show')->with('sarf',$sarf);
    }

    public function editBasicInfo(Sarf $sarf) {
        return view('user.sarf.editbasic')->with('sarf',$sarf);
    }

    public function updateBasicInfo(UpdateBasicInfoSarf $request, Sarf $sarf) {

        $sarf->update($request->validated());

        SpecificObjective::where('sarf_id','=',$sarf->id)->delete();
        foreach($request->objectives as $obj) {
            SpecificObjective::create([
                'sarf_id' => $sarf->id,
                'name'=>$obj
            ]);
        }


        return redirect()->route('sarf.show',$sarf->id)->with('success','Sarf Updated');

    }

    public function editFiles(Sarf $sarf) {
        return view('user.sarf.file')->with('sarf',$sarf);
    }

    public function fileDelete($id) {
        // $file = FileUserInput::findorfail($id);
        // dd($file->truename);

        $file = FileUserInput::findorfail($id);
        $destinationPath = public_path('files/').$file->sarves_id;
        File::delete($destinationPath.'/'.$file->name);

        $file->delete();

        $sarf = Sarf::findorfail($file->sarves_id);

        return redirect()->route('sarf.editFiles',$sarf);
    }

    public function addNewFile(Request $request, $id) {


        if($request->has('files')) {

            $path = public_path('files/'). '/'.$id;
            $pathDir = 'files/'. '/'.$id;
            if(!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            foreach($request->file('files') as $file) {
                $fileName = time().rand(1,1000).'.'.$file->extension();
                $file->move($path, $fileName);

                $file1 = $file->getClientOriginalName();
                $filename1 = pathinfo($file1, PATHINFO_FILENAME);
                $extension = pathinfo($file1, PATHINFO_EXTENSION);

                $fileinput = new FileUserInput();

                $fileinput->sarves_id = $id;
                $fileinput->name = $fileName;
                $fileinput->location = $pathDir;
                $fileinput->truename = $filename1;
                $fileinput->extension = $extension;

                $fileinput->save();
            }

            $sarf = Sarf::findorfail($id);
            return redirect()->route('sarf.editFiles',$sarf);
        }
    }
}
