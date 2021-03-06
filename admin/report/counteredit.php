<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg8.php" ?>
<?php include_once "ewmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "counterinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
$counter_edit = new ccounter_edit();
$Page =& $counter_edit;

// Page init
$counter_edit->Page_Init();

// Page main
$counter_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var counter_edit = new ew_Page("counter_edit");

// page properties
counter_edit.PageID = "edit"; // page ID
counter_edit.FormID = "fcounteredit"; // form ID
var EW_PAGE_ID = counter_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
counter_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_cnid"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($counter->cnid->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_cnid"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($counter->cnid->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_reg_id"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($counter->reg_id->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_reg_id"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($counter->reg_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_counter_1"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($counter->counter_1->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_counter_1"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($counter->counter_1->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}

	// Process detail page
	var detailpage = (fobj.detailpage) ? fobj.detailpage.value : "";
	if (detailpage != "") {
		return eval(detailpage+".ValidateForm(fobj)");
	}
	return true;
}

// extend page with Form_CustomValidate function
counter_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
counter_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
counter_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php $counter_edit->ShowPageHeader(); ?>
<p class="phpmaker ewTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $counter->TableCaption() ?></p>
<p class="phpmaker"><a href="<?php echo $counter->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php
$counter_edit->ShowMessage();
?>
<form name="fcounteredit" id="fcounteredit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return counter_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="counter">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($counter->cnid->Visible) { // cnid ?>
	<tr id="r_cnid"<?php echo $counter->RowAttributes() ?>>
		<td class="ewTableHeader"><?php echo $counter->cnid->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $counter->cnid->CellAttributes() ?>><span id="el_cnid">
<div<?php echo $counter->cnid->ViewAttributes() ?>><?php echo $counter->cnid->EditValue ?></div>
<input type="hidden" name="x_cnid" id="x_cnid" value="<?php echo ew_HtmlEncode($counter->cnid->CurrentValue) ?>">
</span><?php echo $counter->cnid->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($counter->reg_id->Visible) { // reg_id ?>
	<tr id="r_reg_id"<?php echo $counter->RowAttributes() ?>>
		<td class="ewTableHeader"><?php echo $counter->reg_id->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $counter->reg_id->CellAttributes() ?>><span id="el_reg_id">
<input type="text" name="x_reg_id" id="x_reg_id" size="30" value="<?php echo $counter->reg_id->EditValue ?>"<?php echo $counter->reg_id->EditAttributes() ?>>
</span><?php echo $counter->reg_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($counter->counter_1->Visible) { // counter ?>
	<tr id="r_counter_1"<?php echo $counter->RowAttributes() ?>>
		<td class="ewTableHeader"><?php echo $counter->counter_1->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $counter->counter_1->CellAttributes() ?>><span id="el_counter_1">
<input type="text" name="x_counter_1" id="x_counter_1" size="30" value="<?php echo $counter->counter_1->EditValue ?>"<?php echo $counter->counter_1->EditAttributes() ?>>
</span><?php echo $counter->counter_1->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$counter_edit->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include_once "footer.php" ?>
<?php
$counter_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ccounter_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'counter';

	// Page object name
	var $PageObjName = 'counter_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $counter;
		if ($counter->UseTokenInUrl) $PageUrl .= "t=" . $counter->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EW_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EW_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_SUCCESS_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			echo "<p class=\"ewMessage\">" . $sMessage . "</p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			echo "<p class=\"ewSuccessMessage\">" . $sSuccessMessage . "</p>";
			$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			echo "<p class=\"ewErrorMessage\">" . $sErrorMessage . "</p>";
			$_SESSION[EW_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p class=\"phpmaker\">" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Fotoer exists, display
			echo "<p class=\"phpmaker\">" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $counter;
		if ($counter->UseTokenInUrl) {
			if ($objForm)
				return ($counter->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($counter->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ccounter_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (counter)
		if (!isset($GLOBALS["counter"])) {
			$GLOBALS["counter"] = new ccounter();
			$GLOBALS["Table"] =& $GLOBALS["counter"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'counter', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $counter;

		// Create form object
		$objForm = new cFormObj();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		$this->Page_Redirecting($url);
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $counter;

		// Load key from QueryString
		if (@$_GET["cnid"] <> "")
			$counter->cnid->setQueryStringValue($_GET["cnid"]);
		if (@$_POST["a_edit"] <> "") {
			$counter->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$counter->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$counter->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$counter->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($counter->cnid->CurrentValue == "")
			$this->Page_Terminate("counterlist.php"); // Invalid key, return to list
		switch ($counter->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("counterlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$counter->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $counter->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$counter->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$counter->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$counter->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $counter;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $counter;
		if (!$counter->cnid->FldIsDetailKey) {
			$counter->cnid->setFormValue($objForm->GetValue("x_cnid"));
		}
		if (!$counter->reg_id->FldIsDetailKey) {
			$counter->reg_id->setFormValue($objForm->GetValue("x_reg_id"));
		}
		if (!$counter->counter_1->FldIsDetailKey) {
			$counter->counter_1->setFormValue($objForm->GetValue("x_counter_1"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $counter;
		$this->LoadRow();
		$counter->cnid->CurrentValue = $counter->cnid->FormValue;
		$counter->reg_id->CurrentValue = $counter->reg_id->FormValue;
		$counter->counter_1->CurrentValue = $counter->counter_1->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $counter;
		$sFilter = $counter->KeyFilter();

		// Call Row Selecting event
		$counter->Row_Selecting($sFilter);

		// Load SQL based on filter
		$counter->CurrentFilter = $sFilter;
		$sSql = $counter->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$row = $rs->fields;
			$counter->Row_Selected($row);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $counter;
		if (!$rs || $rs->EOF) return;
		$counter->cnid->setDbValue($rs->fields('cnid'));
		$counter->reg_id->setDbValue($rs->fields('reg_id'));
		$counter->counter_1->setDbValue($rs->fields('counter'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $counter;

		// Initialize URLs
		// Call Row_Rendering event

		$counter->Row_Rendering();

		// Common render codes for all row types
		// cnid
		// reg_id
		// counter

		if ($counter->RowType == EW_ROWTYPE_VIEW) { // View row

			// cnid
			$counter->cnid->ViewValue = $counter->cnid->CurrentValue;
			$counter->cnid->ViewCustomAttributes = "";

			// reg_id
			$counter->reg_id->ViewValue = $counter->reg_id->CurrentValue;
			$counter->reg_id->ViewCustomAttributes = "";

			// counter
			$counter->counter_1->ViewValue = $counter->counter_1->CurrentValue;
			$counter->counter_1->ViewCustomAttributes = "";

			// cnid
			$counter->cnid->LinkCustomAttributes = "";
			$counter->cnid->HrefValue = "";
			$counter->cnid->TooltipValue = "";

			// reg_id
			$counter->reg_id->LinkCustomAttributes = "";
			$counter->reg_id->HrefValue = "";
			$counter->reg_id->TooltipValue = "";

			// counter
			$counter->counter_1->LinkCustomAttributes = "";
			$counter->counter_1->HrefValue = "";
			$counter->counter_1->TooltipValue = "";
		} elseif ($counter->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// cnid
			$counter->cnid->EditCustomAttributes = "";
			$counter->cnid->EditValue = $counter->cnid->CurrentValue;
			$counter->cnid->ViewCustomAttributes = "";

			// reg_id
			$counter->reg_id->EditCustomAttributes = "";
			$counter->reg_id->EditValue = ew_HtmlEncode($counter->reg_id->CurrentValue);

			// counter
			$counter->counter_1->EditCustomAttributes = "";
			$counter->counter_1->EditValue = ew_HtmlEncode($counter->counter_1->CurrentValue);

			// Edit refer script
			// cnid

			$counter->cnid->HrefValue = "";

			// reg_id
			$counter->reg_id->HrefValue = "";

			// counter
			$counter->counter_1->HrefValue = "";
		}
		if ($counter->RowType == EW_ROWTYPE_ADD ||
			$counter->RowType == EW_ROWTYPE_EDIT ||
			$counter->RowType == EW_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$counter->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($counter->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$counter->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $counter;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($counter->cnid->FormValue) && $counter->cnid->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $counter->cnid->FldCaption());
		}
		if (!ew_CheckInteger($counter->cnid->FormValue)) {
			ew_AddMessage($gsFormError, $counter->cnid->FldErrMsg());
		}
		if (!is_null($counter->reg_id->FormValue) && $counter->reg_id->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $counter->reg_id->FldCaption());
		}
		if (!ew_CheckInteger($counter->reg_id->FormValue)) {
			ew_AddMessage($gsFormError, $counter->reg_id->FldErrMsg());
		}
		if (!is_null($counter->counter_1->FormValue) && $counter->counter_1->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $counter->counter_1->FldCaption());
		}
		if (!ew_CheckInteger($counter->counter_1->FormValue)) {
			ew_AddMessage($gsFormError, $counter->counter_1->FldErrMsg());
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			ew_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $counter;
		$sFilter = $counter->KeyFilter();
		$counter->CurrentFilter = $sFilter;
		$sSql = $counter->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// cnid
			// reg_id

			$counter->reg_id->SetDbValueDef($rsnew, $counter->reg_id->CurrentValue, 0, FALSE);

			// counter
			$counter->counter_1->SetDbValueDef($rsnew, $counter->counter_1->CurrentValue, 0, FALSE);

			// Call Row Updating event
			$bUpdateRow = $counter->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($counter->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($counter->CancelMessage <> "") {
					$this->setFailureMessage($counter->CancelMessage);
					$counter->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$counter->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
