<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class TotalEducationExport implements FromView, WithEvents, WithTitle, ShouldAutoSize
{
	protected $education;
	protected $duration;
	protected $maleInReport;
	protected $femaleInReport;
	protected $totalInReport;
	protected $maleLapsed;
	protected $femaleLapsed;
	protected $totalLapsed;
	protected $malePlaced;
	protected $femalePlaced;
	protected $totalPlaced;
	protected $maleLiveRegistration;
	protected $femaleLiveRegistration;
	protected $totalLiveRegistration;
	protected $districtName;
	protected $monthName;
	protected $year;
	protected $month;
	protected $quarter;
	protected $half;
	protected $subjectCount;

	public function __construct($education, $duration, $maleInReport, $femaleInReport, $totalInReport, $maleLapsed, $femaleLapsed, $totalLapsed, $malePlaced, $femalePlaced, $totalPlaced, $maleLiveRegistration, $femaleLiveRegistration, $totalLiveRegistration, $districtName, $monthName, $year, $month, $quarter, $half, $subjectCount)
	{
		$this->education = $education;
		$this->duration = $duration;
		$this->maleInReport = $maleInReport;
		$this->femaleInReport = $femaleInReport;
		$this->totalInReport = $totalInReport;
		$this->maleLapsed = $maleLapsed;
		$this->femaleLapsed = $femaleLapsed;
		$this->totalLapsed = $totalLapsed;
		$this->malePlaced = $malePlaced;
		$this->femalePlaced = $femalePlaced;
		$this->totalPlaced = $totalPlaced;
		$this->maleLiveRegistration = $maleLiveRegistration;
		$this->femaleLiveRegistration = $femaleLiveRegistration;
		$this->totalLiveRegistration = $totalLiveRegistration;
		$this->districtName = $districtName;
		$this->monthName = $monthName;
		$this->year = $year;
		$this->month = $month;
		$this->quarter = $quarter;
		$this->half = $half;
		$this->subjectCount = $subjectCount;
	}

	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function (AfterSheet $event) {
				$event->sheet
					->getStyle('A1:O' . ($this->subjectCount + 9))
					->applyFromArray([
						'borders' => [
							'allBorders' => [
								'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
								'color' => ['argb' => '000000'],
							],
						],
					])
					->getAlignment()
					->setHorizontal('center')
					->setVertical('center')
					->setWrapText(true);

				$event->sheet
					->getDelegate()
					->getStyle('A1:O1')
					->getFont()
					->setBold(true);

				$event->sheet
					->getDelegate()
					->getStyle('A' . ($this->subjectCount + 9) . ':O' . ($this->subjectCount + 9))
					->getFont()
					->setBold(true);
			},
		];
	}

	public function title(): string
	{
		return 'Education';
	}

	public function view(): View
	{
		return view('exports.total-education', [
			'education' => $this->education,
			'duration' => $this->duration,
			'maleReport' => $this->maleInReport,
			'femaleReport' => $this->femaleInReport,
			'totalReport' => $this->totalInReport,
			'maleLapsed' => $this->maleLapsed,
			'femaleLapsed' => $this->femaleLapsed,
			'totalLapsed' => $this->totalLapsed,
			'malePlaced' => $this->malePlaced,
			'femalePlaced' => $this->femalePlaced,
			'totalPlaced' => $this->totalPlaced,
			'maleLiveRegister' => $this->maleLiveRegistration,
			'femaleLiveRegister' => $this->femaleLiveRegistration,
			'totalLiveRegister' => $this->totalLiveRegistration,
			'districtName' => $this->districtName,
			'monthName' => $this->monthName,
			'year' => $this->year,
			'month' => $this->month,
			'quarter' => $this->quarter,
			'half' => $this->half,
		]);
	}
}
