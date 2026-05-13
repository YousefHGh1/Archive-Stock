<?php

namespace App\Http\Controllers;

use App\Models\archiveNot;
use App\Models\censorshipNot;
use App\Models\computerNot;
use App\Models\jibayaNot;
use App\Models\legalNot;
use Illuminate\Support\Facades\DB;

class HeadController extends Controller
{
    //

    public function nots()
    {
        //
        $archiveNot = DB::table('archive_nots')->get();
        $censorshipNot = DB::table('censorship_nots')->get();
        $computerNot = DB::table('computer_nots')->get();
        $jibayaNot = DB::table('jibaya_nots')->get();
        $legalNot = DB::table('legal_nots')->get();

        return view('dashboard', [
            'archiveNot' => $archiveNot,
            'computerNot' => $computerNot,
            'jibayaNot' => $jibayaNot,
            'legalNot' => $legalNot,
            'censorshipNot' => $censorshipNot,
            'dashboardStats' => $this->dashboardStats(),
            'dashboardCharts' => $this->dashboardCharts(),
        ]);
    }

    public function nots1()
    {
        //
        $archiveNot = DB::table('archive_nots')->get();
        $censorshipNot = DB::table('censorship_nots')->get();
        $computerNot = DB::table('computer_nots')->get();
        $jibayaNot = DB::table('jibaya_nots')->get();
        $legalNot = DB::table('legal_nots')->get();

        return view('welcome', [
            'archiveNot' => $archiveNot,
            'computerNot' => $computerNot,
            'jibayaNot' => $jibayaNot,
            'legalNot' => $legalNot,
            'censorshipNot' => $censorshipNot
        ]);
    }

    // public function archive()
    // {
    //     //
    //     $archiveNot = archiveNot::all();
    //     return view('archive.table', compact('archiveNot'));
    // }
    // public function legal()
    // {
    //     //
    //     $legalNot = legalNot::all();
    //     return view('legal.table', compact('legalNot'));
    // }
    // public function computer()
    // {
    //     //
    //     $computerNot = computerNot::all();
    //     return view('computer.table', compact('computerNot'));
    // }
    // public function jibaya()
    // {
    //     //
    //     $jibayaNot = jibayaNot::all();
    //     return view('jibaya.table', compact('jibayaNot'));
    // }
    // public function censorship()
    // {
    //     //
    //     $censorshipNot = censorshipNot::all();
    //     return view('censorship.table', compact('censorshipNot'));
    // }

    private function dashboardStats()
    {
        $archiveIncoming = DB::table('archives')->count();
        $archiveOutgoing = DB::table('archive_exports')->count();
        $computerIncoming = DB::table('computers')->count();
        $computerOutgoing = DB::table('computer_exports')->count();
        $censorshipIncoming = DB::table('censorships')->count();
        $censorshipOutgoing = DB::table('censorship_exports')->count();
        $legalIncoming = DB::table('legals')->count();
        $legalOutgoing = DB::table('legalexports')->count();
        $jibayaIncoming = DB::table('jibayas')->count();
        $jibayaOutgoing = DB::table('jibayaexports')->count();
        $inventoryIncoming = DB::table('invoices')->count();
        $inventoryOutgoing = DB::table('invoice_exports')->count();

        return [
            'archiveIncoming' => $archiveIncoming,
            'archiveOutgoing' => $archiveOutgoing,
            'computerIncoming' => $computerIncoming,
            'computerOutgoing' => $computerOutgoing,
            'censorshipIncoming' => $censorshipIncoming,
            'censorshipOutgoing' => $censorshipOutgoing,
            'legalIncoming' => $legalIncoming,
            'legalOutgoing' => $legalOutgoing,
            'jibayaIncoming' => $jibayaIncoming,
            'jibayaOutgoing' => $jibayaOutgoing,
            'inventoryItems' => DB::table('items')->count(),
            'inventoryIncoming' => $inventoryIncoming,
            'inventoryOutgoing' => $inventoryOutgoing,
            'custodies' => DB::table('custodies')->count(),
            'internalMessages' => DB::table('archive_nots')->count()
                + DB::table('legal_nots')->count()
                + DB::table('computer_nots')->count()
                + DB::table('censorship_nots')->count()
                + DB::table('jibaya_nots')->count(),
            'totalArchiveTransactions' => $archiveIncoming + $archiveOutgoing + $computerIncoming + $computerOutgoing
                + $censorshipIncoming + $censorshipOutgoing + $legalIncoming + $legalOutgoing + $jibayaIncoming
                + $jibayaOutgoing,
            'totalInventoryTransactions' => $inventoryIncoming + $inventoryOutgoing,
        ];
    }

    private function dashboardCharts()
    {
        $stats = $this->dashboardStats();

        return [
            'monthLabels' => ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            'archiveDistribution' => [
                'labels' => ['الأرشيف', 'الحاسوب', 'الرقابة', 'الشؤون القانونية', 'الجباية'],
                'incoming' => [
                    DB::table('archives')->count(),
                    DB::table('computers')->count(),
                    DB::table('censorships')->count(),
                    DB::table('legals')->count(),
                    DB::table('jibayas')->count(),
                ],
                'outgoing' => [
                    DB::table('archive_exports')->count(),
                    DB::table('computer_exports')->count(),
                    DB::table('censorship_exports')->count(),
                    DB::table('legalexports')->count(),
                    DB::table('jibayaexports')->count(),
                ],
            ],
            'monthlyArchive' => [
                'incoming' => $this->monthlyCounts([
                    ['archives', 'date'],
                    ['computers', 'date'],
                    ['censorships', 'date'],
                    ['legals', 'date'],
                    ['jibayas', 'date'],
                ]),
                'outgoing' => $this->monthlyCounts([
                    ['archive_exports', 'date'],
                    ['computer_exports', 'date'],
                    ['censorship_exports', 'date'],
                    ['legalexports', 'date'],
                    ['jibayaexports', 'date'],
                ]),
            ],
            'inventoryFlow' => [
                'incoming' => $this->monthlyCounts([['invoices', 'voucher_date']]),
                'outgoing' => $this->monthlyCounts([['invoice_exports', 'voucher_date']]),
            ],
            'messages' => [
                'labels' => ['الأرشيف', 'القانونية', 'الحاسوب', 'الرقابة', 'الجباية'],
                'series' => [
                    DB::table('archive_nots')->count(),
                    DB::table('legal_nots')->count(),
                    DB::table('computer_nots')->count(),
                    DB::table('censorship_nots')->count(),
                    DB::table('jibaya_nots')->count(),
                ],
            ],
            'overallMonthly' => [
                'incoming' => $this->monthlyCounts([
                    ['archives', 'date'],
                    ['computers', 'date'],
                    ['censorships', 'date'],
                    ['legals', 'date'],
                    ['jibayas', 'date'],
                    ['invoices', 'voucher_date'],
                ]),
                'outgoing' => $this->monthlyCounts([
                    ['archive_exports', 'date'],
                    ['computer_exports', 'date'],
                    ['censorship_exports', 'date'],
                    ['legalexports', 'date'],
                    ['jibayaexports', 'date'],
                    ['invoice_exports', 'voucher_date'],
                ]),
            ],
            'departmentTotals' => [
                'labels' => ['الأرشيف', 'الحاسوب', 'الرقابة', 'القانونية', 'الجباية', 'المخازن'],
                'values' => [
                    $stats['archiveIncoming'] + $stats['archiveOutgoing'],
                    $stats['computerIncoming'] + $stats['computerOutgoing'],
                    $stats['censorshipIncoming'] + $stats['censorshipOutgoing'],
                    $stats['legalIncoming'] + $stats['legalOutgoing'],
                    $stats['jibayaIncoming'] + $stats['jibayaOutgoing'],
                    $stats['inventoryIncoming'] + $stats['inventoryOutgoing'],
                ],
            ],
        ];
    }

    private function monthlyCounts(array $tables)
    {
        $months = array_fill(1, 12, 0);
        $currentYear = now()->year;

        $this->fillMonthlyCounts($months, $tables, $currentYear);

        if (array_sum($months) === 0) {
            $latestYear = $this->latestYearFor($tables);

            if ($latestYear && $latestYear !== $currentYear) {
                $months = array_fill(1, 12, 0);
                $this->fillMonthlyCounts($months, $tables, $latestYear);
            }
        }

        return array_values($months);
    }

    private function fillMonthlyCounts(array &$months, array $tables, int $year)
    {
        foreach ($tables as [$table, $dateColumn]) {
            $rows = DB::table($table)
                ->selectRaw("MONTH($dateColumn) as month, COUNT(*) as total")
                ->whereYear($dateColumn, $year)
                ->groupBy('month')
                ->pluck('total', 'month');

            foreach ($rows as $month => $total) {
                $months[(int) $month] += (int) $total;
            }
        }
    }

    private function latestYearFor(array $tables)
    {
        $latestYear = null;

        foreach ($tables as [$table, $dateColumn]) {
            $tableLatestYear = DB::table($table)->selectRaw("MAX(YEAR($dateColumn)) as year")->value('year');

            if ($tableLatestYear) {
                $latestYear = max((int) $tableLatestYear, (int) $latestYear);
            }
        }

        return $latestYear;
    }
}
