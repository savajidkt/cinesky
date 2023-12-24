<?php
namespace App\Exports;
 
use App\Models\User;
use App\Models\UserSurvey;
use App\Models\UserSurveyAnswer;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;

class ReportsExport implements FromView,WithEvents
{   
    protected $user;

    function __construct($user) {
            $this->user = $user;
    }
    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function view(): View
    {

        return view('admin.user.report-export', [
            'reports' =>$this->user
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
           AfterSheet::class => function(AfterSheet $event){
            $columns = ['A','B','C','D','E','F','G','H','I','J','K','L'];
            foreach($columns as $column){
                $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
            }
           },

        ];
    }
}