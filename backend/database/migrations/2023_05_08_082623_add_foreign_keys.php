<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('colleges', function (Blueprint $table) {
            $table->foreign('rector_id')->references('id')->on('lecturers');
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->foreign('director_id')->references('id')->on('lecturers');
        });
        Schema::table('faculties', function (Blueprint $table) {
            $table->foreign('college_id')->references('id')->on('colleges');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('lecturers', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('department_id')->references('id')->on('departments');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('department_id')->references('id')->on('departments');
        });
        Schema::table('student_courses', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('course_id')->references('id')->on('courses');
        });
        Schema::table('qualifications', function (Blueprint $table) {
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('colleges', function (Blueprint $table) {
            $table->dropForeign('rector_id');
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign('faculty_id');
            $table->dropForeign('director_id');
        });
        Schema::table('faculties', function (Blueprint $table) {
            $table->dropForeign('college_id');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('role_id');
        });
        Schema::table('lecturers', function (Blueprint $table) {
            $table->dropForeign('role_id');
            $table->dropForeign('department_id');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign('role_id');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('lecturer_id');
            $table->dropForeign('department_id');
        });
        Schema::table('student_courses', function (Blueprint $table) {
            $table->dropForeign('student_id');
            $table->dropForeign('course_id');
        });
        Schema::table('qualifications', function (Blueprint $table) {
            $table->dropForeign('lecturer_id');
            $table->dropForeign('course_id');
        });
    }
};
