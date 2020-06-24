import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";

import { InertiaLink } from "@inertiajs/inertia-react";

import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

const StaffDetails = ({ staff, staff_image }) => {
    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    console.log(staff);
    console.log(staff_image);

    return (
        <div>
            <div>
                <Banner
                    title={`${staff ? staff.first_name : ""} ${
                        staff ? `${staff.surname}'s Profile` : ""
                    }`}
                />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item ">
                                <a href="/staff">Staff</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/staff" aria-current="page">
                                    {staff ? staff.first_name : ""}{" "}
                                    {staff ? staff.surname : ""}
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="container">
                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9">
                        <>
                            {staff !== null ? (
                                <>
                                    <section>
                                        <img
                                            src={
                                                staff_image.image
                                                    ? staff_image.image
                                                    : ""
                                            }
                                            alt={
                                                staff_image.name
                                                    ? staff_image.name
                                                    : ""
                                            }
                                        />
                                    </section>

                                    <section>
                                        <h4>PERSONAL INFORMATION</h4>

                                        <div className="row">
                                            <span className="col-6">
                                                <span className="staff-details-headings">
                                                    Surname:{" "}
                                                </span>
                                                {staff.surname
                                                    ? staff.surname
                                                    : ""}
                                            </span>

                                            <span className="col-6">
                                                <span className="staff-details-headings">
                                                    First Name:
                                                </span>{" "}
                                                {staff.first_name
                                                    ? staff.first_name
                                                    : ""}
                                            </span>
                                        </div>

                                        <p>
                                            <span className="staff-details-headings">
                                                Date of Birth:
                                            </span>{" "}
                                            {staff.date_of_birth
                                                ? staff.date_of_birth
                                                : ""}
                                        </p>

                                        <p>
                                            <span className="staff-details-headings">
                                                Nationality:
                                            </span>{" "}
                                            {staff.nationality
                                                ? staff.nationality
                                                : ""}
                                        </p>

                                        <p>
                                            <span className="staff-details-headings">
                                                Address:
                                            </span>{" "}
                                            {staff.pobox ? staff.pobox : ""}{" "}
                                            City: {staff.city ? staff.city : ""}
                                        </p>

                                        <div className="row">
                                            <span className="col-6">
                                                <span className="staff-details-headings">
                                                    Telephone Number:
                                                </span>{" "}
                                                {staff.telephone_number
                                                    ? staff.telephone_number
                                                    : ""}
                                            </span>

                                            <span className="col-6">
                                                <span className="staff-details-headings">
                                                    Mobile Number:
                                                </span>{" "}
                                                {staff.mobile_number
                                                    ? staff.mobile_number
                                                    : ""}
                                            </span>
                                        </div>

                                        <p>
                                            <span className="staff-details-headings">
                                                Marital Status:
                                            </span>{" "}
                                            {staff.marital_status &&
                                            staff.marital_status == 1
                                                ? "Married"
                                                : "Single"}
                                        </p>

                                        <p>
                                            <span className="staff-details-headings">
                                                Number of Children:
                                            </span>{" "}
                                            {staff.number_of_children
                                                ? staff.number_of_children
                                                : ""}
                                        </p>
                                    </section>

                                    <section className="mt-5">
                                        <h4>Employment Details</h4>

                                        <div>
                                            <p>
                                                <span className="staff-details-headings">
                                                    DEPARTMENT:
                                                </span>{" "}
                                                {staff.department_id
                                                    ? staff.department_id
                                                    : ""}
                                            </p>

                                            <p>
                                                <span className="staff-details-headings">
                                                    JOB POSITION:
                                                </span>{" "}
                                                {staff.job_position
                                                    ? staff.job_position
                                                    : ""}
                                            </p>

                                            <div className="row">
                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Start Date:
                                                    </span>{" "}
                                                    {staff.start_date
                                                        ? staff.start_date
                                                        : ""}
                                                </span>

                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Commencement Salary:
                                                    </span>{" "}
                                                    {staff.commencement_salary
                                                        ? staff.commencement_salary
                                                        : ""}
                                                </span>
                                            </div>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Nature Of Employment:
                                                </span>{" "}
                                                {staff.employment_id
                                                    ? staff.employment_id
                                                    : ""}
                                            </p>

                                            <div className="">
                                                <a
                                                    href={
                                                        staff.cv_attached
                                                            ? staff.cv_attached
                                                            : ""
                                                    }
                                                    className="btn btn-primary"
                                                >
                                                    Curriculum Vitae
                                                </a>
                                            </div>
                                        </div>
                                    </section>

                                    <section className="mt-5">
                                        <h4>CURRENT PHYSICAL ADDRESS</h4>

                                        <div>
                                            <div className="row">
                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Town:
                                                    </span>{" "}
                                                    {staff.town
                                                        ? staff.town
                                                        : ""}
                                                </span>

                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Street/Road:
                                                    </span>{" "}
                                                    {staff.street
                                                        ? staff.street
                                                        : ""}
                                                </span>
                                            </div>

                                            <div className="row">
                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Zone:
                                                    </span>{" "}
                                                    {staff.zone
                                                        ? staff.zone
                                                        : ""}
                                                </span>

                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Street/Road:
                                                    </span>{" "}
                                                    {staff.landmarks
                                                        ? staff.landmarks
                                                        : ""}
                                                </span>
                                            </div>

                                            <h6>ANCESTRAL HOME</h6>
                                            <p>
                                                <span className="staff-details-headings">
                                                    District:
                                                </span>{" "}
                                                {staff.ancestral_district
                                                    ? staff.ancestral_district
                                                    : ""}
                                            </p>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Town:
                                                </span>{" "}
                                                {staff.ancestral_town
                                                    ? staff.ancestral_town
                                                    : ""}
                                            </p>
                                        </div>
                                    </section>

                                    <section className="mt-5">
                                        <h4>
                                            EMERGENCY CONTACTS: eg upon any form
                                            of incapacitation or death
                                        </h4>

                                        <div>
                                            <p>
                                                <span className="staff-details-headings">
                                                    Name:
                                                </span>{" "}
                                                {staff.next_of_kin_name_one
                                                    ? staff.next_of_kin_name_one
                                                    : ""}
                                            </p>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Relationship to employee:
                                                </span>{" "}
                                                {staff.next_of_kin_relationship_one
                                                    ? staff.next_of_kin_relationship_one
                                                    : ""}
                                            </p>

                                            <div className="row">
                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Telephone Number:
                                                    </span>{" "}
                                                    {staff.next_of_kin_telephone_number_one
                                                        ? staff.next_of_kin_telephone_number_one
                                                        : ""}
                                                </span>

                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Mobile Number:
                                                    </span>{" "}
                                                    {staff.next_of_kin_mobile_number_one
                                                        ? staff.next_of_kin_mobile_number_one
                                                        : ""}
                                                </span>
                                            </div>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Email:
                                                </span>{" "}
                                                {staff.next_of_kin_email_one
                                                    ? staff.next_of_kin_email_one
                                                    : ""}
                                            </p>
                                        </div>

                                        <h6>Alternative Contact</h6>
                                        <div>
                                            <p>
                                                <span className="staff-details-headings">
                                                    Name:
                                                </span>{" "}
                                                {staff.next_of_kin_name_two
                                                    ? staff.next_of_kin_name_two
                                                    : ""}
                                            </p>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Relationship to employee:
                                                </span>{" "}
                                                {staff.next_of_kin_relationship_two
                                                    ? staff.next_of_kin_relationship_two
                                                    : ""}
                                            </p>

                                            <div className="row">
                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Telephone Number:
                                                    </span>{" "}
                                                    {staff.next_of_kin_telephone_number_two
                                                        ? staff.next_of_kin_telephone_number_two
                                                        : ""}
                                                </span>

                                                <span className="col-6">
                                                    <span className="staff-details-headings">
                                                        Mobile Number:
                                                    </span>{" "}
                                                    {staff.next_of_kin_mobile_number_two
                                                        ? staff.next_of_kin_mobile_number_two
                                                        : ""}
                                                </span>
                                            </div>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Email:
                                                </span>{" "}
                                                {staff.next_of_kin_email_two
                                                    ? staff.next_of_kin_email_two
                                                    : ""}
                                            </p>
                                        </div>
                                    </section>

                                    <section className="mt-5">
                                        <h4>ACADEMIC QUALIFICATIONS</h4>

                                        <div>
                                            <p>
                                                <span className="staff-details-headings">
                                                    Maters:
                                                </span>{" "}
                                                {staff.academic_masters
                                                    ? staff.academic_masters
                                                    : ""}
                                            </p>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Bachelors:
                                                </span>{" "}
                                                {staff.academic_bachelors
                                                    ? staff.academic_bachelors
                                                    : ""}
                                            </p>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Diploma:
                                                </span>{" "}
                                                {staff.academic_diploma
                                                    ? staff.academic_diploma
                                                    : ""}
                                            </p>

                                            <p>
                                                <span className="staff-details-headings">
                                                    Certificate:
                                                </span>{" "}
                                                {staff.academic_certificate
                                                    ? staff.academic_certificate
                                                    : ""}
                                            </p>
                                        </div>
                                    </section>

                                    <section className="mt-5">
                                        <h4>PAYROLL DETAILS</h4>

                                        <div>
                                            <ol style={{ listStyle: "" }}>
                                                <li className="">
                                                    <div className="row">
                                                        <span className="col-6">
                                                            <span className="staff-details-headings">
                                                                Name of Bank:
                                                            </span>{" "}
                                                            {staff.bank_name
                                                                ? staff.bank_name
                                                                : ""}
                                                        </span>

                                                        <span>
                                                            <span className="staff-details-headings">
                                                                Bank Branch:
                                                            </span>{" "}
                                                            {staff.bank_branch_name
                                                                ? staff.bank_branch_name
                                                                : ""}
                                                        </span>
                                                    </div>
                                                </li>

                                                <li>
                                                    <span className="staff-details-headings">
                                                        Bank Account:
                                                    </span>{" "}
                                                    {staff.bank_account_number
                                                        ? staff.bank_account_number
                                                        : ""}
                                                </li>

                                                <li>
                                                    <span className="staff-details-headings">
                                                        NSSF Number:
                                                    </span>{" "}
                                                    {staff.nssf_number
                                                        ? staff.nssf_number
                                                        : ""}
                                                </li>

                                                <li>
                                                    <span className="staff-details-headings">
                                                        Local service Tax (LST)
                                                        Division:
                                                    </span>{" "}
                                                    {staff.local_service_tax_division
                                                        ? staff.local_service_tax_division
                                                        : ""}
                                                </li>
                                            </ol>
                                        </div>
                                    </section>
                                </>
                            ) : (
                                <div>
                                    <h3>
                                        No Profile For Staff Member Available
                                    </h3>
                                </div>
                            )}
                        </>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default StaffDetails;

StaffDetails.layout = page => (
    <Layout children={page} title="Staff Details | Kampala Hospital" />
);
