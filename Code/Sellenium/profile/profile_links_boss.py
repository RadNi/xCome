import unittest

from selenium import webdriver
from test_utility import static_data


class BossPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_profile_main_page(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("mainpage").click()

        assert (static_data.base_url + "boss/profile") == driver.current_url

    def test_profile_user_information(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("userinfo").click()

        assert (static_data.base_url + "boss/information") == driver.current_url

    def test_profile_transaction_history(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("transactions").click()

        assert (static_data.base_url + "boss/transactions") == driver.current_url

    def test_profile_users_table(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("users-table").click()

        assert (static_data.base_url + "boss/users-table") == driver.current_url

    def test_profile_clerks_table(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("clerk-table").click()

        assert (static_data.base_url + "boss/clerk-table") == driver.current_url

    def test_profile_contact_us(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("contact_us").click()

        assert (static_data.base_url + "boss/contact") == driver.current_url

    def test_profile_clerk_message(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("clerk-message").click()

        assert (static_data.base_url + "boss/messages") == driver.current_url

    def tearDown(self):
        self.driver.close()
