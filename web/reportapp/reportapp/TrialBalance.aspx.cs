using CrystalDecisions.CrystalReports.Engine;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace reportapp
{
    public partial class TrialBalance : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            ReportDocument report = new ReportDocument();
            report.Load(Server.MapPath("Reports/GACSTrialBal.rpt"));
            report.SetParameterValue("@vote_code", Request.QueryString["vote_code"]);
            report.SetParameterValue("@curr_fiscal_yr", Request.QueryString["curr_fiscal_yr"]);
            CrystalReportViewer1.ReportSource = report;
        }
    }
}