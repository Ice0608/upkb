import ExcelJS from 'exceljs';

window.exportToExcel = async function exportToExcel() {
    const btn = event?.target?.closest?.('button') || document.querySelector('button[onclick="exportToExcel()"]');
    if (!btn) return;
    
    const originalHtml = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
    btn.disabled = true;

    try {
        const d = window.REPORT_DATA;
        if (!d) {
            throw new Error('Report data not found. Please refresh the page.');
        }

        const workbook = new ExcelJS.Workbook();
        workbook.creator = 'SESOC';
        workbook.created = new Date();

        // ── Sheet 1: Registration Details ──
        const ws1 = workbook.addWorksheet('Registration Details', {
            pageSetup: { orientation: 'landscape', fitToPage: true, fitToWidth: 1, fitToHeight: 0 }
        });

        ws1.mergeCells('A1:K1');
        const titleCell = ws1.getCell('A1');
        titleCell.value = `REGISTRATION DETAILS REGISTER - ${d.eventName}`;
        titleCell.font = { name: 'Calibri', size: 14, bold: true };
        titleCell.alignment = { horizontal: 'center', vertical: 'middle' };
        ws1.getRow(1).height = 30;

        ws1.mergeCells('A2:K2');
        const subCell = ws1.getCell('A2');
        subCell.value = `Total Registrations: ${d.totalRegistrations}`;
        subCell.font = { name: 'Calibri', size: 11, italic: true };
        subCell.alignment = { horizontal: 'center', vertical: 'middle' };

        const headers = ['No.', 'Attendee Name', 'Email', 'No. Tel', 'Ref Code', 'Course', 'College', 'Payment Type', 'Payment Status', 'Pre Reg (RM)', 'Pegawai Temuduga'];
        const headerRow = ws1.addRow(headers);
        headerRow.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        headerRow.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        headerRow.alignment = { horizontal: 'center', vertical: 'middle', wrapText: true };
        headerRow.height = 28;

        d.registrations.forEach((r, i) => {
            const row = ws1.addRow([
                i + 1,
                r.nama_pelajar,
                r.email,
                r.no_tel,
                r.noreff,
                r.kursus,
                r.institusi,
                r.payment_method,
                r.payment_status,
                r.pre_reg,
                r.closer,
            ]);
            row.font = { name: 'Calibri', size: 10 };
            row.getCell(1).alignment = { horizontal: 'center' };
            row.getCell(8).alignment = { horizontal: 'center' };
            row.getCell(9).alignment = { horizontal: 'center' };
            row.getCell(10).numFmt = '#,##0.00';
            row.height = 18;
        });

        const summaryRow = ws1.addRow([
            '', '', '', '', '', '', '', '', 'FINANCIAL SUMMARY', d.insights.totalPreReg, ''
        ]);
        summaryRow.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        summaryRow.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        summaryRow.getCell(9).alignment = { horizontal: 'left' };
        summaryRow.getCell(10).numFmt = '#,##0.00';

        ws1.getColumn(1).width = 5;
        ws1.getColumn(2).width = 30;
        ws1.getColumn(3).width = 22;
        ws1.getColumn(4).width = 14;
        ws1.getColumn(5).width = 12;
        ws1.getColumn(6).width = 26;
        ws1.getColumn(7).width = 12;
        ws1.getColumn(8).width = 16;
        ws1.getColumn(9).width = 16;
        ws1.getColumn(10).width = 14;
        ws1.getColumn(11).width = 22;

        [headerRow, ...ws1.getRows()?.slice(4)].forEach(r => {
            if (!r) return;
            r.eachCell(c => {
                c.border = {
                    top: { style: 'thin' },
                    left: { style: 'thin' },
                    bottom: { style: 'thin' },
                    right: { style: 'thin' },
                };
            });
        });

        // ── Sheet 2: Payment Analysis ──
        const ws2 = workbook.addWorksheet('Payment Analysis', {
            pageSetup: { orientation: 'landscape', fitToPage: true, fitToWidth: 1, fitToHeight: 0 }
        });

        ws2.mergeCells('A1:E1');
        ws2.getCell('A1').value = `PAYMENT ANALYSIS REPORT - ${d.eventName}`;
        ws2.getCell('A1').font = { name: 'Calibri', size: 14, bold: true };
        ws2.getCell('A1').alignment = { horizontal: 'center', vertical: 'middle' };
        ws2.getRow(1).height = 30;

        ws2.mergeCells('A2:E2');
        ws2.getCell('A2').value = `Total Transactions: ${d.totalRegistrations}`;
        ws2.getCell('A2').font = { name: 'Calibri', size: 11, italic: true };
        ws2.getCell('A2').alignment = { horizontal: 'center' };

        ws2.mergeCells('A3:E3');
        ws2.getCell('A3').value = 'PAYMENT METHOD ANALYSIS';
        ws2.getCell('A3').font = { name: 'Calibri', size: 12, bold: true };
        ws2.getCell('A3').alignment = { horizontal: 'center' };
        ws2.getRow(3).height = 24;

        const pmHeaders = ['Payment Method', 'Transactions', '% Share', 'Revenue (RM)', 'Avg. Per Txn (RM)'];
        const pmHeaderRow = ws2.addRow(pmHeaders);
        pmHeaderRow.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        pmHeaderRow.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        pmHeaderRow.alignment = { horizontal: 'center', vertical: 'middle', wrapText: true };
        pmHeaderRow.height = 24;

        d.paymentMethodRows.forEach(r => {
            const row = ws2.addRow([r.label, r.transactions, `${r.share.toFixed(1)}%`, r.revenue, r.average]);
            row.font = { name: 'Calibri', size: 10 };
            row.getCell(1).font = { name: 'Calibri', size: 10, bold: true };
            row.getCell(4).numFmt = '#,##0.00';
            row.getCell(5).numFmt = '#,##0.00';
        });

        const pmTotal = ws2.addRow(['TOTAL', d.totalRegistrations, '100%', d.insights.totalRevenue, d.totalRegistrations > 0 ? d.insights.totalRevenue / d.totalRegistrations : 0]);
        pmTotal.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        pmTotal.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        pmTotal.getCell(4).numFmt = '#,##0.00';
        pmTotal.getCell(5).numFmt = '#,##0.00';

        ws2.addRow([]);
        const psTitleRow = ws2.addRow(['PAYMENT STATUS ANALYSIS']);
        ws2.mergeCells(`A${psTitleRow.number}:E${psTitleRow.number}`);
        psTitleRow.font = { name: 'Calibri', size: 12, bold: true };
        psTitleRow.alignment = { horizontal: 'center' };

        const psHeaders = ['Payment Status', 'Registrations', '% Share', 'Revenue (RM)', 'Avg. Per Reg (RM)'];
        const psHeaderRow = ws2.addRow(psHeaders);
        psHeaderRow.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        psHeaderRow.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        psHeaderRow.alignment = { horizontal: 'center', vertical: 'middle', wrapText: true };
        psHeaderRow.height = 24;

        d.paymentStatusRows.forEach(r => {
            const row = ws2.addRow([r.label, r.registrations, `${r.share.toFixed(1)}%`, r.revenue, r.average]);
            row.font = { name: 'Calibri', size: 10 };
            row.getCell(4).numFmt = '#,##0.00';
            row.getCell(5).numFmt = '#,##0.00';
        });

        const psTotal = ws2.addRow(['TOTAL', d.totalRegistrations, '100%', d.insights.totalRevenue, d.totalRegistrations > 0 ? d.insights.totalRevenue / d.totalRegistrations : 0]);
        psTotal.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        psTotal.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        psTotal.getCell(4).numFmt = '#,##0.00';
        psTotal.getCell(5).numFmt = '#,##0.00';

        ws2.addRow([]);
        const insightTitle = ws2.addRow(['PAYMENT ANALYSIS INSIGHTS']);
        ws2.mergeCells(`A${insightTitle.number}:E${insightTitle.number}`);
        insightTitle.font = { name: 'Calibri', size: 12, bold: true };
        insightTitle.alignment = { horizontal: 'center' };

        const insightRow = ws2.addRow([`Most popular payment method: ${d.insights.popularMethodLabel} (${d.insights.popularMethodShare.toFixed(1)}% of all transactions)`]);
        ws2.mergeCells(`A${insightRow.number}:E${insightRow.number}`);
        insightRow.font = { name: 'Calibri', size: 10, bold: true };
        insightRow.alignment = { horizontal: 'center' };

        const footerRow = ws2.addRow([`Report ID: ${d.reportId}`]);
        ws2.mergeCells(`A${footerRow.number}:E${footerRow.number}`);
        footerRow.font = { name: 'Calibri', size: 9, italic: true, color: { argb: '927464' } };
        footerRow.alignment = { horizontal: 'center' };

        [1, 2, 3, 4, 5].forEach(i => { ws2.getColumn(i).width = 22; });
        ws2.getColumn(2).width = 16;
        ws2.getColumn(3).width = 14;

        [pmHeaderRow, pmTotal, psHeaderRow, ...ws2.getRows()?.slice(ws2.rowCount - d.paymentStatusRows.length - 5)].forEach(r => {
            if (!r || !r.eachCell) return;
            r.eachCell(c => {
                c.border = {
                    top: { style: 'thin' },
                    left: { style: 'thin' },
                    bottom: { style: 'thin' },
                    right: { style: 'thin' },
                };
            });
        });

        // ── Sheet 3: Closer Performance ──
        const ws3 = workbook.addWorksheet('Closer Performance', {
            pageSetup: { orientation: 'landscape', fitToPage: true, fitToWidth: 1, fitToHeight: 0 }
        });

        ws3.mergeCells('A1:G1');
        ws3.getCell('A1').value = `PERFORMANCE ANALYSIS BY CLOSER - ${d.eventName}`;
        ws3.getCell('A1').font = { name: 'Calibri', size: 14, bold: true };
        ws3.getCell('A1').alignment = { horizontal: 'center', vertical: 'middle' };
        ws3.getRow(1).height = 30;

        ws3.mergeCells('A2:G2');
        ws3.getCell('A2').value = `Total Closers: ${d.insights.totalClosers}`;
        ws3.getCell('A2').font = { name: 'Calibri', size: 11, italic: true };
        ws3.getCell('A2').alignment = { horizontal: 'center' };

        ws3.mergeCells('A3:G3');
        ws3.getCell('A3').value = 'CLOSER PERFORMANCE RANKING';
        ws3.getCell('A3').font = { name: 'Calibri', size: 12, bold: true };
        ws3.getCell('A3').alignment = { horizontal: 'center' };
        ws3.getRow(3).height = 24;

        const cHeaders = ['Rank', 'Closer Name', 'Closing', 'Completed', 'Partial', 'Pending', 'Total Revenue (RM)'];
        const cHeaderRow = ws3.addRow(cHeaders);
        cHeaderRow.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        cHeaderRow.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        cHeaderRow.alignment = { horizontal: 'center', vertical: 'middle', wrapText: true };
        cHeaderRow.height = 28;

        d.closerRows.forEach((r, i) => {
            const row = ws3.addRow([i + 1, r.closer.toUpperCase(), r.closing, r.completed, r.partial, r.pending, r.revenue]);
            row.font = { name: 'Calibri', size: 10 };
            row.getCell(2).font = { name: 'Calibri', size: 10, bold: true };
            row.getCell(7).numFmt = '#,##0.00';
        });

        const cTotal = ws3.addRow([
            '', 'TOTAL',
            d.closerRows.reduce((s, r) => s + r.closing, 0),
            d.closerRows.reduce((s, r) => s + r.completed, 0),
            d.closerRows.reduce((s, r) => s + r.partial, 0),
            d.closerRows.reduce((s, r) => s + r.pending, 0),
            d.closerRows.reduce((s, r) => s + r.revenue, 0),
        ]);
        cTotal.font = { name: 'Calibri', size: 10, bold: true, color: { argb: 'FFFFFF' } };
        cTotal.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: '441421' } };
        cTotal.getCell(7).numFmt = '#,##0.00';

        ws3.addRow([]);
        const perfTitle = ws3.addRow(['PERFORMANCE INSIGHTS']);
        ws3.mergeCells(`A${perfTitle.number}:G${perfTitle.number}`);
        perfTitle.font = { name: 'Calibri', size: 12, bold: true };
        perfTitle.alignment = { horizontal: 'center' };

        const insights = [
            `Top 3 closers account for ${d.insights.topThreeShare.toFixed(1)}% of all registrations`,
            `Average registrations per closer: ${d.insights.averagePerCloser.toFixed(1)}`,
            `${d.insights.activeClosers} active closers out of ${d.insights.totalClosers} total`,
            `Top closer completion rate: ${d.insights.topCompletionRate.toFixed(1)}% (${d.insights.topCloser?.completed ?? 0} of ${d.insights.topCloser?.closing ?? 0})`,
        ];
        insights.forEach(text => {
            const row = ws3.addRow([text]);
            ws3.mergeCells(`A${row.number}:G${row.number}`);
            row.font = { name: 'Calibri', size: 10, bold: true };
        });

        const footer3 = ws3.addRow([`Report ID: ${d.reportId}`]);
        ws3.mergeCells(`A${footer3.number}:G${footer3.number}`);
        footer3.font = { name: 'Calibri', size: 9, italic: true, color: { argb: '927464' } };
        footer3.alignment = { horizontal: 'center' };

        ws3.getColumn(1).width = 8;
        ws3.getColumn(2).width = 30;
        ws3.getColumn(3).width = 12;
        ws3.getColumn(4).width = 14;
        ws3.getColumn(5).width = 12;
        ws3.getColumn(6).width = 12;
        ws3.getColumn(7).width = 20;

        [cHeaderRow, ...ws3.getRows()?.slice(5, 5 + d.closerRows.length)].forEach(r => {
            if (!r || !r.eachCell) return;
            r.eachCell(c => {
                c.border = {
                    top: { style: 'thin' },
                    left: { style: 'thin' },
                    bottom: { style: 'thin' },
                    right: { style: 'thin' },
                };
            });
        });

        // ── Generate & Download ──
        const buffer = await workbook.xlsx.writeBuffer();
        const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `EVENT_REPORT_${d.eventName.replace(/[^a-zA-Z0-9]/g, '_')}_${new Date().toISOString().slice(0, 10)}.xlsx`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    } catch (err) {
        console.error('Export failed:', err);
        alert('Failed to export Excel file: ' + err.message);
    } finally {
        btn.innerHTML = originalHtml;
        btn.disabled = false;
    }
};