using CrystalDecisions.CrystalReports.Engine;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace reportapp
{
    public partial class GfsList : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            ReportDocument report = new ReportDocument();
            report.Load(Server.MapPath("Reports/GACSGFSLIST.rpt"));
            report.SetParameterValue("@ClassificationDesc", Request.QueryString["ClassificationDesc"]);
            report.SetParameterValue("@SubChapterDescr", Request.QueryString["SubChapterDescr"]);
            CrystalReportViewer1.ReportSource = report;
        }
    }
}