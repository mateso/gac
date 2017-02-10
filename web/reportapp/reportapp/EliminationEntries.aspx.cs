using CrystalDecisions.CrystalReports.Engine;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace reportapp
{
    public partial class EliminationEntries : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            ReportDocument report = new ReportDocument();
            report.Load(Server.MapPath("Reports/GACSEliminationList.rpt"));
            report.SetParameterValue("@report_code", Request.QueryString["report_type"]);
            report.SetParameterValue("@curr_fiscal_yr", Request.QueryString["curr_fiscal_yr"]);
            CrystalReportViewer1.ReportSource = report;
        }
    }
}