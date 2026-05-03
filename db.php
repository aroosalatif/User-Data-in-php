<?php

// =============================================
//   db.php - No Database | Pure PHP Table
//   Data array mein store hoga, display bhi yahan
// =============================================

// ---- DATA (Database ki jagah array) ----
$students = [
    [
        'id'         => 1,
        'naam'       => 'Ali Hassan',
        'roll_no'    => 'CS-101',
        'class'      => 'BSc IT',
        'subject'    => 'PHP Programming',
        'marks'      => 88,
        'grade'      => 'A',
        'fees'       => 25000,
        'city'       => 'Lahore',
        'status'     => 'Active',
    ],
    [
        'id'         => 2,
        'naam'       => 'Sara Khan',
        'roll_no'    => 'CS-102',
        'class'      => 'BSc IT',
        'subject'    => 'Web Development',
        'marks'      => 95,
        'grade'      => 'A+',
        'fees'       => 25000,
        'city'       => 'Karachi',
        'status'     => 'Active',
    ],
    [
        'id'         => 3,
        'naam'       => 'Usman Malik',
        'roll_no'    => 'CS-103',
        'class'      => 'BSc CS',
        'subject'    => 'Database Systems',
        'marks'      => 72,
        'grade'      => 'B',
        'fees'       => 28000,
        'city'       => 'Multan',
        'status'     => 'Active',
    ],
    [
        'id'         => 4,
        'naam'       => 'Ayesha Noor',
        'roll_no'    => 'CS-104',
        'class'      => 'BSc CS',
        'subject'    => 'Data Structures',
        'marks'      => 61,
        'grade'      => 'C',
        'fees'       => 28000,
        'city'       => 'Islamabad',
        'status'     => 'Inactive',
    ],
    [
        'id'         => 5,
        'naam'       => 'Bilal Ahmed',
        'roll_no'    => 'CS-105',
        'class'      => 'MCS',
        'subject'    => 'Machine Learning',
        'marks'      => 91,
        'grade'      => 'A+',
        'fees'       => 35000,
        'city'       => 'Faisalabad',
        'status'     => 'Active',
    ],
    [
        'id'         => 6,
        'naam'       => 'Hina Raza',
        'roll_no'    => 'CS-106',
        'class'      => 'MCS',
        'subject'    => 'Networking',
        'marks'      => 78,
        'grade'      => 'B+',
        'fees'       => 35000,
        'city'       => 'Lahore',
        'status'     => 'Active',
    ],
    [
        'id'         => 7,
        'naam'       => 'Kamran Siddiqui',
        'roll_no'    => 'CS-107',
        'class'      => 'BSc IT',
        'subject'    => 'Operating Systems',
        'marks'      => 55,
        'grade'      => 'D',
        'fees'       => 25000,
        'city'       => 'Quetta',
        'status'     => 'Inactive',
    ],
    [
        'id'         => 8,
        'naam'       => 'Zara Fatima',
        'roll_no'    => 'CS-108',
        'class'      => 'BSc CS',
        'subject'    => 'Software Engineering',
        'marks'      => 83,
        'grade'      => 'A',
        'fees'       => 28000,
        'city'       => 'Peshawar',
        'status'     => 'Active',
    ],
];

// ---- HELPER FUNCTION: Grade ke hisab se color ----
function gradeColor($grade) {
    switch ($grade) {
        case 'A+': return '#16a34a';
        case 'A':  return '#2563eb';
        case 'B+': return '#7c3aed';
        case 'B':  return '#0891b2';
        case 'C':  return '#d97706';
        case 'D':  return '#dc2626';
        default:   return '#6b7280';
    }
}

// ---- TOTAL STATS ----
$total     = count($students);
$active    = count(array_filter($students, fn($s) => $s['status'] === 'Active'));
$avg_marks = round(array_sum(array_column($students, 'marks')) / $total, 1);
$total_fees= array_sum(array_column($students, 'fees'));

?>
<!DOCTYPE html>
<html lang="ur" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records | db.php</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&family=JetBrains+Mono:wght@400;600&family=Sora:wght@300;400;600;700&display=swap');

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0d1117;
            --surface:   #161b22;
            --border:    #30363d;
            --accent:    #58a6ff;
            --accent2:   #3fb950;
            --text:      #e6edf3;
            --muted:     #8b949e;
            --row-hover: #1c2128;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Sora', sans-serif;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        /* ---- HEADER ---- */
        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .header .badge {
            display: inline-block;
            background: #161b22;
            border: 1px solid var(--border);
            color: var(--accent);
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            padding: 0.3rem 0.9rem;
            border-radius: 20px;
            margin-bottom: 1rem;
            letter-spacing: 0.05em;
        }
        .header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.02em;
        }
        .header h1 span { color: var(--accent); }
        .header p {
            color: var(--muted);
            margin-top: 0.4rem;
            font-size: 0.9rem;
        }

        /* ---- STATS CARDS ---- */
        .stats {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1rem 1.8rem;
            text-align: center;
            min-width: 140px;
            transition: border-color 0.2s;
        }
        .stat-card:hover { border-color: var(--accent); }
        .stat-card .num {
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'JetBrains Mono', monospace;
            color: var(--accent);
        }
        .stat-card .lbl {
            font-size: 0.75rem;
            color: var(--muted);
            margin-top: 0.2rem;
            text-transform: uppercase;
            letter-spacing: 0.07em;
        }

        /* ---- TABLE WRAPPER ---- */
        .table-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 4px 32px rgba(0,0,0,0.4);
        }
        .table-wrap table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        thead tr {
            background: #0d1117;
            border-bottom: 1px solid var(--border);
        }
        thead th {
            padding: 0.85rem 1rem;
            text-align: left;
            color: var(--muted);
            font-weight: 600;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            white-space: nowrap;
            font-family: 'JetBrains Mono', monospace;
        }
        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: var(--row-hover); }
        tbody td {
            padding: 0.85rem 1rem;
            color: var(--text);
            vertical-align: middle;
        }

        /* ---- CELLS ---- */
        .cell-id {
            font-family: 'JetBrains Mono', monospace;
            color: var(--muted);
            font-size: 0.8rem;
        }
        .cell-name { font-weight: 600; }
        .cell-roll {
            font-family: 'JetBrains Mono', monospace;
            color: var(--accent);
            font-size: 0.82rem;
        }
        .cell-marks {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 600;
        }
        .grade-badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            font-family: 'JetBrains Mono', monospace;
            color: #fff;
        }
        .status-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 20px;
            font-size: 0.73rem;
            font-weight: 600;
        }
        .status-active   { background: rgba(63,185,80,0.15); color: #3fb950; border: 1px solid #3fb95040; }
        .status-inactive { background: rgba(248,81,73,0.15);  color: #f85149; border: 1px solid #f8514940; }

        /* ---- FOOTER ---- */
        .footer-note {
            text-align: center;
            margin-top: 2rem;
            color: var(--muted);
            font-size: 0.8rem;
            font-family: 'JetBrains Mono', monospace;
        }
        .footer-note span { color: var(--accent); }

        @media (max-width: 768px) {
            .table-wrap { overflow-x: auto; }
            .header h1 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="badge">📁 db.php — No Database Mode</div>
    <h1>Student <span>Records</span> Table</h1>
    <p>PHP array se data store & display — koi database nahi</p>
</div>

<!-- STATS -->
<div class="stats">
    <div class="stat-card">
        <div class="num"><?= $total ?></div>
        <div class="lbl">Total Students</div>
    </div>
    <div class="stat-card">
        <div class="num"><?= $active ?></div>
        <div class="lbl">Active</div>
    </div>
    <div class="stat-card">
        <div class="num"><?= $avg_marks ?>%</div>
        <div class="lbl">Avg Marks</div>
    </div>
    <div class="stat-card">
        <div class="num">Rs <?= number_format($total_fees) ?></div>
        <div class="lbl">Total Fees</div>
    </div>
</div>

<!-- TABLE -->
<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>Naam (نام)</th>
                <th>Roll No</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Grade</th>
                <th>Fees (Rs)</th>
                <th>City</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $row): ?>
            <tr>
                <td class="cell-id"><?= str_pad($row['id'], 3, '0', STR_PAD_LEFT) ?></td>
                <td class="cell-name"><?= htmlspecialchars($row['naam']) ?></td>
                <td class="cell-roll"><?= htmlspecialchars($row['roll_no']) ?></td>
                <td><?= htmlspecialchars($row['class']) ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td class="cell-marks"><?= $row['marks'] ?>/100</td>
                <td>
                    <span class="grade-badge" style="background-color: <?= gradeColor($row['grade']) ?>;">
                        <?= $row['grade'] ?>
                    </span>
                </td>
                <td><?= number_format($row['fees']) ?></td>
                <td><?= htmlspecialchars($row['city']) ?></td>
                <td>
                    <span class="status-badge <?= $row['status'] === 'Active' ? 'status-active' : 'status-inactive' ?>">
                        <?= $row['status'] ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- FOOTER -->
<div class="footer-note">
    Total <span><?= $total ?></span> records | Pure PHP | <span>No Database</span> Required
</div>

</body>
</html>
